<?php
/*
 * Plugin Name: GC Testimonials
 * Description: This plugin will help you to collect and show testimonials
 * Author: Erin Garscadden
 * Version: 1.2
 * Requires: 3.0 or higher
 *  
 *  
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('GCT_NAME', 'gc-testimonials');
define('GCT_TAXONOMY', 'testimonial-category');
define('GCT_POST_TYPE', 'testimonial');

$url = plugins_url().'/'.GCT_NAME;
define('GCT_URL', $url);

/**********************************************************
* Register Scripts/CSS
**********************************************************/

function gct_testimominal_custom_scripts() { 
	
	global $post; 
	
	if ( strstr($post->post_content, '[single-testimonial') || 
		 strstr($post->post_content, '[random-testimonial') || 
		 strstr($post->post_content, '[full-testimonials') || 
		 strstr($post->post_content, '[testimonial-form')) {
			wp_enqueue_style('gctstyles', plugins_url('/assets/css/gctestimonial.css', __FILE__ ), false, '1.0', 'all');
	}
	
	if ( strstr($post->post_content, '[full-testimonials') ) {
		add_action('wp_footer', 'gct_custom_pagination');
		wp_enqueue_script('gct-pager', plugins_url('/assets/js/quickpager.jquery.js', __FILE__ ), array('jquery'), '1.0', true);
	}
	
	if ( strstr($post->post_content, '[testimonial-form') ) {
		add_action('wp_footer', 'gct_custom_validate');
		wp_enqueue_script('gct-validation', plugins_url('/assets/js/jquery.validate.min.js', __FILE__ ), array('jquery'));
	}
}

add_action( 'wp_enqueue_scripts', 'gct_testimominal_custom_scripts');

function gct_custom_validate() {
	$output = '<script type="text/javascript">jQuery(document).ready(function($) { $("#create_testimonial_form").validate(); });</script>';
	echo $output;	
}

function gct_custom_pagination() {
	$output = '<script type="text/javascript">';
	$output .= 'jQuery(document).ready(function($) {';
	$output .= '$("#testimonials_container").quickPager({ pageSize: 5, currentPage: 1, pagerLocation: "after" });';
	$output .= '});';
	$output .= '</script>';
	echo $output;		
}

/* Widget */

function gct_widget_script() {
	wp_enqueue_script('gct-slider', plugins_url('/assets/js/jquery.cycle.all.js', __FILE__ ), array('jquery'));
}

function gct_widget_code() {
	$output = '<script type="text/javascript">jQuery(document).ready(function($) { $("#tcycle").cycle({ fx: "fade", speed: 1500, timeout: 8000, pause: 1}); });</script>';
	echo $output;		
}

/**********************************************************
* Register Post Type and Taxonomy
**********************************************************/
	
add_action('init', 'gct_testimonial_register');

function gct_testimonial_register() {
	$testimonial_labels = array(
		'name'                  => _x('Testimonials', 'Testimonial type general name'),
		'singular_name'         => _x('Testimonial Item', 'Testimonial singular name'),
		'add_new'               => __('Add New'),
		'add_new_item'          => __('Add New Testimonial'),
		'edit_item'             => __('Edit Testimonial'),
		'new_item'              => __('New Testimonial'),
		'view_item'             => __('View Testimonial'),
		'search_items'          => __('Search Testimonials'),
		'not_found'             =>  __('Nothing Found'),
		'not_found_in_trash'    => __('Nothing found in Trash'),
		'parent_item_colon'     => ''
	);
	
	$testimonial_args = array(
		'labels'                => $testimonial_labels,
		'singular_label'        => __('testimonial'),
		'public'                => true,
		'show_ui'               => true,
		'capability_type'       => 'post',
		'hierarchical'          => false,
		'rewrite'               => true,
		'menu_icon'				=> GCT_URL.'/assets/images/icon_16.png',
		'menu_position'			=> 20,
		'supports'              => array('title', 'excerpt', 'editor', 'thumbnail')
	);
	
	register_post_type('testimonial',$testimonial_args);
	
	$categories_labels = array(
		'name'                  => __('Testimonial Categories'),
		'singular_name'         => _x('Testimonial Category', 'singular name'),
		'add_new'               => _x('Add New', 'Testimonial Category'),
		'add_new_item'          => __('Add New Category'),
		'edit_item'             => __('Edit Category'),
		'new_item'              => __('New Category'),
		'view_item'             => __('View Category'),
		'search_items'          => __('Search Category'),
		'not_found'             =>  __('Nothing Found'),
		'not_found_in_trash'    => __('Nothing found in Trash'),
		'parent_item_colon'     => ''
	);
	
	register_taxonomy("testimonial-category", array("testimonial"), array(
		"hierarchical" => true, 
		"labels" => $categories_labels,
		"rewrite" => array("slug" => "view", "hierarchical" => false, "with_front" => false)
	));
	
	add_filter("manage_edit-testimonial_columns", "gct_edit_columns");
	add_action("manage_posts_custom_column", "gct_custom_columns");
	
}
	
/**********************************************************
* Add Custom Columns to the Admin Screen
**********************************************************/

function gct_custom_columns($column) {
	global $post;
	$custom = get_post_custom();
	if ("post_id" == $column) echo $post->ID;
	elseif ("description" == $column) echo substr($post->post_content, 0, 100).'...';
	elseif ("client_name" == $column)  echo $custom["client_name"][0];
	elseif ("thumbnail" == $column) echo $post->post_thumbnail;
	elseif ("shortcode" == $column)  echo '[single-testimonial id="'.$post->ID.'"]';
	elseif("category" == $column) {
		$categories = get_the_terms(0, "testimonial-category");
			if(!is_array($categories)) return;
			$category = reset($categories);
		if(is_object($category)){
			echo $category->name;
		}
	}
}

function gct_edit_columns($columns) {
	$columns = array(
		"cb" 			=> "<input type=\"checkbox\" />",
		"title" 		=> __('Title'),
		"client_name" 	=> __('Client'),
		"thumbnail" 	=> __('Thumbnail'),
		"category" 		=> __('Category'),
		"shortcode" 	=> __('Shortcode'),
		"date" 			=> __('Date'),
	);
	return $columns;
}

set_post_thumbnail_size(75, 75, true);
 
// For Thumbnail Preview in the admin screen
if (function_exists('add_theme_support')) {
 
	function add_thumbnail_column($cols) { 
		$cols['thumbnail'] = __('Thumbnail'); 
		return $cols;
	}
 
	function add_thumbnail_value($column_name, $post_id) {
		$width = (int) 75;
		$height = (int) 75;
		
		if ( 'thumbnail' == $column_name ) {
			$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
			$attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
			
			if ($thumbnail_id)
				$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
			elseif ($attachments) {
				foreach ( $attachments as $attachment_id => $attachment ) {
					$thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
				}
			}
			
			if ( isset($thumb) && $thumb ) {
				echo $thumb;
			} else {
				echo __('None');
			}
		}
	}
 	
	add_filter( 'manage_posts_columns', 'add_thumbnail_column' );
	add_action( 'manage_posts_custom_column', 'add_thumbnail_value', 10, 2 );
}

/**********************************************************
* Add Extra Custom Fields to the Post Type Add / Edit screen
* Plus Update Method
**********************************************************/
	
add_action("admin_init", "gct_admin_init");  
add_action('save_post', 'gct_save_details');

function gct_admin_init() {
	add_meta_box("details", "Details", "gct_meta_options", "testimonial", "normal", "low");
}

function gct_meta_options() {  
       global $post;  
       $custom = get_post_custom($post->ID);  
       $client_name = $custom["client_name"][0]; 
       $client_photo = $custom["client_photo"][0];
       $email = $custom["email"][0];
       $company_website = $custom["company_website"][0];
       $company_name = $custom["company_name"][0];
	?>
	<table width="100%" border="0" class="options" cellspacing="5" cellpadding="5">
		<tr>
		<td width="10%"><label for="client_name">Client</label></td>
		<td width="10%"><input type="text" id="client_name" name="client_name" value="<?php echo $client_name; ?>" size="40"/></td>
		<td width="70%" class="extra small"><small>The Clients Name</small></td>
		</tr>
		<tr>
		<td width="10%"><label for="email">Email</label></td>
		<td width="10%"><input type="text" id="email" name="email" value="<?php echo $email; ?>" size="40"/></td>
		<td width="70%" class="extra small"><small>The Clients Email</small></td>
		</tr>
		<tr>
		<td width="10%"><label for="company_website">Website</label></td>
		<td width="10%"><input type="text" id="company_website" name="company_website" value="<?php echo $company_website; ?>" size="40"/></td>
		<td width="70%" class="extra small"><small>The Company Website</small></td>
		</tr>
		<tr>
		<td width="10%"><label for="company_name">Company Name</label></td>
		<td width="10%"><input type="text" id="company_name" name="company_name" value="<?php echo $company_name; ?>" size="40"/></td>
		<td width="70%" class="extra small"><small>The Company Name</small></td>
		</tr>
	</table>
	<?php
   } 
   
function gct_save_details() {  
	global $post;  
	$custom_meta_fields = array( 'client_name','client_photo','email','company_website','company_name' );
	foreach( $custom_meta_fields as $custom_meta_field ):
		if(isset($_POST[$custom_meta_field]) && $_POST[$custom_meta_field] != ""):
			update_post_meta($post->ID, $custom_meta_field, $_POST[$custom_meta_field]);
		endif;
	endforeach;
}

/**********************************************************
* Add Columns to the Testimonials Categories Screen
**********************************************************/

add_filter("manage_edit-testimonial-category_columns", 'kcvt_manage_categories');

function kcvt_manage_categories($columns) {
	$new_columns = array(
		'cb' 			=> '<input type="checkbox" />',
		'name' 			=> __('Name'),
		'slug' 			=> __('Slug'),
		'shortcode' 	=> __('Shortcode'),
		'posts' 		=> __('Posts')
		);
	return $new_columns;
}

add_filter("manage_testimonial-category_custom_column", 'kcvt_manage_columns', 10, 3);	
 
function kcvt_manage_columns($out, $column_name, $id) {
	$column = get_term($id, 'testimonial-category');
	switch ($column_name) {
		case 'shortcode':	
			$output .= '[full-testimonials category="'.$id.'"]'; 
 			break;
 		case 'ID':	
			$output .= $id; 
 			break;
 			
		default:
			break;
	}
	return $output;	
}
	
/**********************************************************
* Shortcodes
**********************************************************/

/* Single Testimonial LAYOUT */

function gct_single_testimonial($testimonial) {
	$display .= '<div class="testimonial">';
	$display .= '<div class="inner">';
	
	if(!empty($testimonial->post_title)):
		$display .=  '<h3>'.$testimonial->post_title.'</h3>';
	endif;
	
	if(has_post_thumbnail($testimonial->ID)) {
		$display .= '<div class="photo">'.get_the_post_thumbnail($testimonial->ID, array(100, 100)).'</div>';
	}
	
	$display .=   '<div class="content">'.$testimonial->post_content.'</div>';
	$display .=   '<div class="clear"></div>';
	$display .=   '<div class="client"><span class="name">'.$testimonial->client_name.'</span><br/>';
	
	if(!empty($testimonial->company_name) && !empty($testimonial->company_website)):
		$display .=   '<span class="company">';
		$display .=   '<a href="'.$testimonial->company_website.'" target="blank">'.$testimonial->company_name.'</a>';
		$display .=   '</span>';
	 elseif(!empty($testimonial->company_name)):
	 	$display .=   '<span class="company">';
	 	$display .=   $testimonial->company_name;
	 	$display .=   '</span>';
	 elseif(!empty($testimonial->company_website)):
	 	$display .=   '<span class="website">';
	 	$display .=   $testimonial->company_website;
	 	$display .=   '</span>';
	 endif;
	 
	 $display .=   '</div>';
	 $display .=   '</div>';
	 $display .=   '</div>';
	 
	 return $display;
}

/* Single Testimonial Shortcode */
    
function gct_single_testimonial_shortcode($atts) {
	
	global $add_styles;
	$add_styles = true;
	
	extract(shortcode_atts(array('id' => ''), $atts));
	
	$post = get_post($id);
				
	// Add custom fields
	$selected_extended_posts = array();
	$custom = get_post_custom($post->ID);
		foreach(array('client_name', 'client_photo', 'email', 'company_website', 'company_name') as $field) {
			if(isset($custom[$field])){
				$post->$field = $custom[$field][0];
			}
		}
		
	$selected_extended_posts[] = $post;		
	$testimonial = $post;
	$display .= gct_single_testimonial($testimonial);
	//$display .= '<div class="testimonial-more"><a href="">More Testimonials &#187;</a></div>';
	 
	return $display;
}

add_shortcode('single-testimonial', 'gct_single_testimonial_shortcode');

/* Random Testimonial Shortcode */
    
function gct_random_testimonial_shortcode($atts) {
	
	global $add_styles;
	$add_styles = true;
	
	extract(shortcode_atts(array('category' => '', 'limit' => ''), $atts));
	
	if(isset($limit) && $limit != '') { $ppp = $limit; } else { $ppp = "1"; }
	
	if(isset($category) && $category != '') {
		$term = get_term_by('id', $category, 'testimonial-category');
		$args = array(
			$term->taxonomy 	=> $term->slug,
			'post_type' 		=> 'testimonial', 
			'posts_per_page' 	=> $ppp,
			'orderby'         	=> 'rand',
			'post_status'     	=> 'publish'
		);
	} else { 
		$args = array(
			'post_type' 		=> 'testimonial', 
			'posts_per_page' 	=> $ppp,
			'orderby'         	=> 'rand',
			'post_status'     	=> 'publish'
		);
	}
	
	$temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query();
	$posts_array  = $wp_query->query($args);
	
	foreach($posts_array as $post) {	
		// Add custom fields
		$selected_extended_posts = array();
		$custom = get_post_custom($post->ID);
			foreach(array('client_name', 'client_photo', 'email', 'company_website', 'company_name') as $field) {
				if(isset($custom[$field])){
					$post->$field = $custom[$field][0];
				}
			}
			
		$selected_extended_posts[] = $post;		
		$testimonial = $post;
		$display .= gct_single_testimonial($testimonial);
	}
	 
	return $display;

}

add_shortcode('random-testimonial', 'gct_random_testimonial_shortcode');

/* Full Testimonials Shortcode */
    
function gct_full_testimonials_shortcode($atts) {
	
	global $add_styles, $add_pagination;
	$add_styles = true;
	$add_pagination = true;
	
	extract(shortcode_atts(array('category' => ''), $atts));
	
	if ($category != '') { 
		$term = get_term_by('id', $category, 'testimonial-category');
		$term_id = $term->term_id;
		$term_taxonomy = $term->taxonomy;
		$term_slug = $term->slug;
	} else { 
		$term_taxonomy = '';
		$term_slug = '';
	}
	
	$args = array(
		$term_taxonomy 		=> $term_slug,
		'post_type' 		=> 'testimonial', 
		'posts_per_page' 	=> -1,
		'orderby'         	=> 'post_date',
		'order'				=> 'DESC',
		'post_status'     	=> 'publish'
	);
	
	$temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query();
	$posts_array  = $wp_query->query($args);
	
	$display .= '<div id="testimonials_container">';
	
	foreach($posts_array as $post) {
					
		// Add custom fields
		$selected_extended_posts = array();
		$custom = get_post_custom($post->ID);
			foreach(array('client_name', 'client_photo', 'email', 'company_website', 'company_name') as $field) {
				if(isset($custom[$field])){
					$post->$field = $custom[$field][0];
				}
			}
			
		$selected_extended_posts[] = $post;		
		$testimonial = $post;
		
		$display .= '<div class="result">';
		$display .= gct_single_testimonial($testimonial);
		$display .= '</div>';
	}
	
	$display .= '</div>';
	$display .= '<div id="pagingControls"></div>';
	 
	return $display;

}

add_shortcode('full-testimonials', 'gct_full_testimonials_shortcode');

/* Testimonial Submit Form */

function gct_form_shortcode($atts) {
	
	global $add_styles, $add_validation;
	$add_styles = true;
	$add_validation = true;
    
	if (isset( $_POST['gct_create_testimonial_form_submitted'] ) && wp_verify_nonce($_POST['gct_create_testimonial_form_submitted'], 'gct_create_testimonial_form') ){
	
		$gct_client_name = trim($_POST['gct_client_name']);
		$gct_email = trim($_POST['gct_email']);
		$gct_company_name = trim($_POST['gct_company_name']);
		$gct_company_website = trim($_POST['gct_company_website']);
		$gct_headline = trim($_POST['gct_headline']);  
		$gct_text = trim($_POST['gct_text']);  
		$gct_agree = trim($_POST['gct_agree']); 
		
		if ($gct_client_name != '' && $gct_email != '' && $gct_text != '' && $gct_agree != '') {
		
			$testimonial_data = array(
				'post_title' => $gct_headline,
				'post_content' => $gct_text,
				'post_status' => 'pending',
				'post_type' => 'testimonial'
			);
			
			if ($testimonial_id = wp_insert_post($testimonial_data)) {
				
				add_post_meta($testimonial_id, "client_name", $gct_client_name);
				add_post_meta($testimonial_id, "email", $gct_email);
				add_post_meta($testimonial_id, "company_name", $gct_company_name);
				add_post_meta($testimonial_id, "company_website", $gct_company_website);
				
				if($_FILES['gct_client_photo']['size'] > 1) {
					foreach($_FILES as $field => $file){
						
						// Upload File
						$overrides = array('test_form' => false); 
						$uploaded_file = gct_wp_handle_upload($_FILES['gct_client_photo'], $overrides);
						$gct_client_photo = $uploaded_file['url'];
					
						// Create an Attachment
						$attachment = array(
						    'post_title' => $file['name'],
						    'post_content' => '',
						    'post_type' => 'attachment',
						    'post_parent' => $testimonial_id,
						    'post_mime_type' => $file['type'],
						    'guid' => $uploaded_file['url']
					    );
					    
					    $attach_id = wp_insert_attachment( $attachment, $uploaded_file['file'], $testimonial_id );
					  	$attach_data = wp_generate_attachment_metadata( $attach_id, $uploaded_file['file'] );
					  	wp_update_attachment_metadata( $attach_id,  $attach_data );
  						add_post_meta($testimonial_id, 'client_photo', $gct_client_photo);
					    set_post_thumbnail( $testimonial_id, $attach_id );

					}
				}
				
				return '<div class="testimonial-success">Thank You! Your Testimonial is awaiting moderation.</div>';
			}
	
		} else {
		
			$error = '<strong>Please check that you have filled out the required fields.</strong><br />';  
			if ($gct_agree != 'yes') { $error .= '- Please agree to your testimonial being published.<br />'; }
			if ($gct_client_name == '') { $error .= '- Please enter your name.<br />'; }
			if ($gct_email == '') { $error .= '- Please enter your email address.<br />'; }	
			if ($gct_text == '') { $error .= '- Please enter your testimonial.<br />'; }
		}
	
	}
	
	return gct_get_create_testimonial_form($error, $success, $gct_client_name, $gct_email, $gct_company_name, $gct_company_website, $gct_headline, $gct_text, $gct_agree, $gct_client_photo);

}

add_shortcode('testimonial-form', 'gct_form_shortcode');
		
function gct_get_create_testimonial_form($error = '', $success = '', $gct_client_name = '', $gct_email = '', $gct_company_name = '', $gct_company_website = '', $gct_headline = '', $gct_text = '', $gct_agree = '', $gct_client_photo = '') {
	
	$html .= '<div id="testimonial-form">';
	if($error != '') { $html .= '<div class="error">'.$error.'</div>'; }
	$html .= '<div class="required_notice"><span class="required">* </span>= Required Field</div>';
	$html .= '<form id="create_testimonial_form" method="post" action="" enctype="multipart/form-data">';
	$html .= wp_nonce_field('gct_create_testimonial_form', 'gct_create_testimonial_form_submitted');
	
	$html .= '
		<p class=" form-field">
			<label for="gct_client_name">Full Name: <span class="req">*</span></label>
			<input type="text" value="' . $gct_client_name . '" name="gct_client_name" id="gct_client_name" class="text required"  minlength="2" />
			<span>What is your fullname?</span>
		</p>
		
		<p class=" form-field">
			<label for="gct_email">Email: <span class="req">*</span></label>
			<input type="text" value="' . $gct_email . '" name="gct_email" id="gct_email" class="text required email" />
			<span>Fill in your email address </span>
		</p>
		
		<p class=" form-field">
			<label for="gct_company_name">Company Name:</label>
			<input type="text" value="' . $gct_company_name . '" name="gct_company_name" id="gct_company_name" class="text" />
			<span>What is your company name? </span>
		</p>
		
		<p class=" form-field">
			<label for="gct_company_website">Company Website:</label>
			<input type="text" value="' . $gct_company_website . '" name="gct_company_website" id="gct_company_website" class="text" />
			<span>Does your company have a website?</span>
		</p>
		
		<p class=" form-field">
			<label for="gct_headline">Heading:</label>
			<input type="text" value="' . $gct_headline . '" name="gct_headline" id="gct_headline" class="text" />
			<span>Describe our company in a few short words </span>
		</p>
		
		<p class=" form-field">
			<label for="gct_text">Testimonial: <span class="req">*</span></label>
			<textarea name="gct_text" id="gct_text" class="textarea  required">' . $gct_text . '</textarea><br />
			<span>What do you think about our company?</span>
		</p>
		
		<div class="clear"></div>
		
		<p class=" form-field">
			<label for="gct_client_photo">Photo:</label>
			<input type="file" name="gct_client_photo" id="gct_client_photo" value="' . $gct_client_photo . '" class="text" /><br />
			<span>Do you have a photo we can use?</span>
		</p>
			
		<p class=" form-field agree">
			<input type="checkbox" value="yes" name="gct_agree" id="gct_agree" class="checkbox required" checked="checked" />  
			<span class="req">*</span> I agree that this testimonial can be published.
		</p>
		
		<div class="clear"></div>
		
		<p class="form-field">
			<input type="submit" id="gct_submit_testimonial" name="gct_submit_testimonial" value="Add Testimonial" class="button" validate="required:true" /> 
		</p>
	';
	
	$html .= '</form>';
	$html .= '</div>';
	
	return $html;
	
}

function gct_wp_handle_upload($file_handler,$overrides) {

  require_once(ABSPATH . "wp-admin" . '/includes/image.php');
  require_once(ABSPATH . "wp-admin" . '/includes/file.php');
  require_once(ABSPATH . "wp-admin" . '/includes/media.php');

  $upload = wp_handle_upload( $file_handler, $overrides );
  return $upload ;
}

/**********************************************************
* Testimonial Widget
**********************************************************/

add_action('widgets_init', 'gct_load_testimonial_widgets' );

function gct_load_testimonial_widgets() {
	register_widget('GCT_Testimonial_Menu_Widget');
}

class GCT_Testimonial_Menu_Widget extends WP_Widget {
	
	function GCT_Testimonial_Menu_Widget() {
		
		$widget_ops = array( 'classname' => 'gc-testimonial-widget', 'description' => 'Use this widget to show testimonials in your sidebar.' );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'gc-testimonial-widget' );
		$this->WP_Widget( 'gc-testimonial-widget', 'Testimonial Widget', $widget_ops, $control_ops );
	}

	function widget($args, $instance) {
		
		if (is_active_widget( '', '', 'gc-testimonial-widget' )) {
			wp_enqueue_style('gctwidgetstyles', plugins_url('/assets/css/gctwidget.css', __FILE__ ), false, '1.0', 'all');
			add_action('wp_footer', 'gct_widget_script');
			add_action('wp_footer', 'gct_widget_code');
		}
		
		$data = array_merge($args, $instance);
		
		echo $data['before_widget'];
		
		if ( !empty( $data['title'] ) ) { echo $data['before_title'] . $data['title'] . $data['after_title']; };
		if ( !empty( $data['limit'] ) ) { $no =  $data['limit']; } else { $no = '2'; }
		
		if ($data['category'] != 'all') { 
			$term = get_term_by('id', $data['category'], 'testimonial-category');
			$term_taxonomy = $term->taxonomy;
			$term_slug = $term->slug;
		} else { 
			$term_taxonomy = '';
			$term_slug = '';
		}
		
		$args = array(
			$term_taxonomy 		=> $term_slug,
			'posts_per_page' 	=> $no,
			'orderby'         	=> 'post_date',
			'order'				=> 'DESC',
			'post_type' 		=> 'testimonial', 
			'post_status'     	=> 'publish'
		);
		
		$temp = $wp_query;
		$wp_query= null;
		$wp_query = new WP_Query();
		$posts_array  = $wp_query->query($args);
		
		if ($data['type'] == 'cycle') { echo '<div id="tcycle">'; }
				
		foreach($posts_array as $post) {
					
			// Add custom fields
			$selected_extended_posts = array();
			$custom = get_post_custom($post->ID);
				foreach(array('client_name', 'client_photo', 'company_website', 'company_name') as $field) {
					if(isset($custom[$field])){
						$post->$field = $custom[$field][0];
					}
				}
			$selected_extended_posts[] = $post;
						
			$testimonial = $post;
		
			echo '<div class="testimonial-widget">';
		
			if(!empty($testimonial->post_title)):
				echo '<h5>'.$testimonial->post_title.'</h5>';
			endif; 
			
			if ($data['images'] == 'yes') {
				if(has_post_thumbnail($testimonial->ID)) {
					echo '<div class="photo">'.get_the_post_thumbnail($testimonial->ID, array(75, 75)).'</div>';
				}
			}
			
			echo '<div class="content">'.$testimonial->post_content.'</div>';
			
			echo '<div class="clear"></div>';
			
			echo '<div class="client"><span class="name">'.$testimonial->client_name.'</span><br/>';
			
			if(!empty($testimonial->company_name) && !empty($testimonial->company_website)):
				echo '<span class="company">';
				echo '<a href="'.$testimonial->company_website.'" target="blank">'.$testimonial->company_name.'</a>';
				echo '</span>';
			 elseif(!empty($testimonial->company_name)):
				echo '<span class="company">';
				echo $testimonial->company_name;
				echo '</span>';
			 elseif(!empty($testimonial->company_website)):
				echo '<span class="website">';
				echo $testimonial->company_website;
				echo '</span>';
			 endif;
		 
		 	echo '</div>';
		 	
		 echo '</div>';
		 
	}
	
	if ($data['type'] == 'cycle') { echo '</div><div class="clear"></div>'; }
	
	if ($data['more'] == 'yes') { 
		$link = get_permalink($data['fullpage']);
		echo '<p class="kcvtst-widget-readmore"><a href="'.$link.'">Read More Testimonials &#187;</a></p>'; 
	}
		
	echo $data['after_widget'];
	
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['category'] = strip_tags($new_instance['category']);
		$instance['limit'] = strip_tags($new_instance['limit']);
		$instance['more'] = strip_tags($new_instance['more']);
		$instance['fullpage'] = strip_tags($new_instance['fullpage']);
		$instance['images'] = strip_tags($new_instance['images']);
		$instance['type'] = strip_tags($new_instance['type']);
		return $instance;
	}
	
	function form($instance) {
		$defaults = array( 'title' => 'Testimonial');
		$instance = wp_parse_args( (array) $instance, $defaults); 
		$category_list = get_terms('testimonial-category', array(
			'hide_empty' 	=> false,
			'order_by'		=> 'name',
			'pad_counts'	=> true
		));
		
		$pages_list = get_pages(array(
		    'sort_order' => 'ASC',
		    'sort_column' => 'post_title',
		    'post_type' => 'page',
		    'post_status' => 'publish'
    	));
		
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('category'); ?>">Category:</label>
			<select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" class="widefat">
				<option value="all">Show All</option>
				<?php
				foreach($category_list as $category) {
					$data['categories'][$category->term_id] = $category->name . ' (' . $category->count . ')';
					echo '<option value="'.$category->term_id.'"';
					if ($category->term_id == $instance['category']) { echo ' selected="selected"'; }
					echo '>'.$category->name.'</option>';
				}
				?>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('type'); ?>">Type</label>
			<select id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>" class="widefat">
				<option value="static" <?php if($instance['type'] == 'static') { echo 'selected="selected"'; } ?>>Static</option>
				<option value="cycle" <?php if($instance['type'] == 'cycle') { echo 'selected="selected"'; } ?>>Cycle</option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('limit'); ?>">Number of testimonials to show:</label>
			<input type="text" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" value="<?php echo $instance['limit']; ?>" size="3" />
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo $this->get_field_id('images'); ?>" name="<?php echo $this->get_field_name('images'); ?>" value="yes" <?php if ($instance['images'] == 'yes') { echo 'checked="checked"'; } ?>  class="checkbox" style="width: 5%; position: relative; top: -1px;" /> 
			<label for="<?php echo $this->get_field_id('images'); ?>">Show Images?</label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo $this->get_field_id('more'); ?>" name="<?php echo $this->get_field_name('more'); ?>" value="yes" <?php if ($instance['more'] == 'yes') { echo 'checked="checked"'; } ?>  class="checkbox" style="width: 5%; position: relative; top: -1px;" /> 
			<label for="<?php echo $this->get_field_id('more'); ?>">Show Read More Link?</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('fullpage'); ?>">Full Testimonials Page:</label>
			<select id="<?php echo $this->get_field_id('fullpage'); ?>" name="<?php echo $this->get_field_name('fullpage'); ?>" class="widefat">
				<option value="*">Please Select</option>
				<?php
				foreach($pages_list as $pages) {
					echo '<option value="'.$pages->ID.'"';
					if ($pages->ID == $instance['fullpage']) { echo ' selected="selected"'; }
					echo '>'.$pages->post_title.'</option>';
				}
				?>
			</select>
		</p>
				
		<?php
	}
	
} 




	
