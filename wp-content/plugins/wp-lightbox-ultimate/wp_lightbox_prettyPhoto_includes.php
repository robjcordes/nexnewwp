<?php

function wp_lightbox_prettyPhoto_anchor_text_image_display($link,$text,$description,$gallery_group)

{

	if(!empty($gallery_group))

	{



		$wp_lightbox_prettyPhoto_rel = 'wp_lightbox_prettyPhoto['.$gallery_group.']';



	}

	else

	{

		$wp_lightbox_prettyPhoto_rel = 'wp_lightbox_prettyPhoto';

	}



	$wp_lightbox_output = <<<EOT

	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor">

	<a title="$description" href="$link" rel="$wp_lightbox_prettyPhoto_rel">$text</a>

	</div>	

EOT;

		

	return $wp_lightbox_output;

	

}



function wp_lightbox_prettyPhoto_anchor_text_video_display($link,$width,$height,$text,$description,$gallery_group)

{

	global $wp_lightbox_config;

	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');

	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');

	if(!empty($gallery_group))

	{



		$wp_lightbox_prettyPhoto_rel = 'wp_lightbox_prettyPhoto['.$gallery_group.']';



	}

	else

	{

		$wp_lightbox_prettyPhoto_rel = 'wp_lightbox_prettyPhoto';

	}

	if(empty($width)&&empty($height))

	{

		$wp_lightbox_output = <<<EOT

		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor">

		<a title="$description" href="$link?width=$wp_lightbox_width&amp;height=$wp_lightbox_height" rel="$wp_lightbox_prettyPhoto_rel">$text</a>

		</div>	

EOT;

	}

	else

	{

		$wp_lightbox_output = <<<EOT

		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor">

		<a title="$description" href="$link?width=$width&amp;height=$height" rel="$wp_lightbox_prettyPhoto_rel">$text</a>

		</div>	

EOT;

	}

	

	return $wp_lightbox_output;

}



function wp_lightbox_prettyPhoto_anchor_text_flash_video_display($link,$width,$height,$text,$description,$gallery_group)

{

	global $wp_lightbox_config;

	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');

	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');

	if(!empty($gallery_group))

	{



		$wp_lightbox_prettyPhoto_rel = 'wp_lightbox_prettyPhoto['.$gallery_group.']';



	}

	else

	{

		$wp_lightbox_prettyPhoto_rel = 'wp_lightbox_prettyPhoto[flash]';

	}

	

	if(empty($width)&&empty($height))

	{

		$wp_lightbox_output = <<<EOT

		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor">

		<a title="$description" href="$link?width=$wp_lightbox_width&amp;height=$wp_lightbox_height" rel="$wp_lightbox_prettyPhoto_rel">$text</a>

		</div>	

EOT;

	}

	else

	{

		$wp_lightbox_output = <<<EOT

		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor">

		<a title="$description" href="$link?width=$width&amp;height=$height" rel="$wp_lightbox_prettyPhoto_rel">$text</a>	

		</div>

EOT;

	}

	

	return $wp_lightbox_output;

}



function wp_lightbox_prettyPhoto_image_display($link,$description,$source,$title,$gallery_group)

{

	

	if(!empty($gallery_group))

	{



		$wp_lightbox_prettyPhoto_rel = 'wp_lightbox_prettyPhoto['.$gallery_group.']';



	}

	else

	{

		$wp_lightbox_prettyPhoto_rel = 'wp_lightbox_prettyPhoto';

	}



	$wp_lightbox_output = <<<EOT

	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor">

	<a href="$link" rel="$wp_lightbox_prettyPhoto_rel" title="$description"><img src="$source" alt="$title" /></a>

	</div>	

EOT;

	return $wp_lightbox_output;

}



function wp_lightbox_prettyPhoto_video_display($link,$width,$height,$description,$source,$title,$gallery_group)

{

	global $wp_lightbox_config;

	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');

	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');

	if(!empty($gallery_group))

	{



		$wp_lightbox_prettyPhoto_rel = 'wp_lightbox_prettyPhoto['.$gallery_group.']';



	}

	else

	{

		$wp_lightbox_prettyPhoto_rel = 'wp_lightbox_prettyPhoto';

	}

	if(empty($width)&&empty($height))

	{

		$wp_lightbox_output = <<<EOT

		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor">

		<a title="$description" href="$link?width=$wp_lightbox_width&amp;height=$wp_lightbox_height" rel="$wp_lightbox_prettyPhoto_rel"><img src="$source" alt="$title"/></a>

		</div>	

EOT;

	}

	else

	{

		$wp_lightbox_output = <<<EOT

		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor">

		<a title="$description" href="$link?width=$width&amp;height=$height" rel="$wp_lightbox_prettyPhoto_rel"><img src="$source" alt="$title"/></a>

		</div>	

EOT;

	}

	

	return $wp_lightbox_output;

}



function wp_lightbox_prettyPhoto_flash_video_display($link,$width,$height,$description,$source,$title,$gallery_group)

{

	global $wp_lightbox_config;

	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');

	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');

	if(!empty($gallery_group))

	{



		$wp_lightbox_prettyPhoto_rel = 'wp_lightbox_prettyPhoto['.$gallery_group.']';



	}

	else

	{

		$wp_lightbox_prettyPhoto_rel = 'wp_lightbox_prettyPhoto[flash]';

	}

	

	if(empty($width)&&empty($height))

	{

		$wp_lightbox_output = <<<EOT

		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor">

		<a title="$description" href="$link?width=$wp_lightbox_width&amp;height=$wp_lightbox_height" rel="$wp_lightbox_prettyPhoto_rel"><img src="$source" alt="$title"/></a>

		</div>	

EOT;

	}

	else

	{

		$wp_lightbox_output = <<<EOT

		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor">

		<a title="$description" href="$link?width=$width&amp;height=$height" rel="$wp_lightbox_prettyPhoto_rel"><img src="$source" alt="$title"/></a>

		</div>	

EOT;

	}

	

	return $wp_lightbox_output;

}



function wp_lightbox_prettyPhoto_anchor_text_pdf_display($link,$width,$height,$title,$text)

{

	global $wp_lightbox_config;

	if(empty($width) || empty($height))

	{

		$width = $wp_lightbox_config->getValue('wp_lightbox_width');

		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	

	}

	$wp_lightbox_prettyPhoto_rel = 'wp_lightbox_prettyPhoto[iframes]';

	$wp_lightbox_output = <<<EOT

	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor">

	<a title="$title" href="$link?iframe=true&width=$width&amp;height=$height" rel="$wp_lightbox_prettyPhoto_rel">$text</a>	

	</div>

EOT;

	return $wp_lightbox_output;

}



function wp_lightbox_prettyPhoto_pdf_display($link,$width,$height,$title,$source)

{

	global $wp_lightbox_config;

	if(empty($width) || empty($height))

	{

		$width = $wp_lightbox_config->getValue('wp_lightbox_width');

		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	

	}

	$wp_lightbox_prettyPhoto_rel = 'wp_lightbox_prettyPhoto[iframes]';

	$wp_lightbox_output = <<<EOT

	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor">

	<a title="$title" href="$link?iframe=true&width=$width&amp;height=$height" rel="$wp_lightbox_prettyPhoto_rel"><img src="$source" alt="" /></a>

	</div>	

EOT;

	return $wp_lightbox_output;

}



function wp_lightbox_anchor_text_display_external_page_display($link,$width,$height,$title,$text)

{

	global $wp_lightbox_config;

	$browser = new WP_LIGHTBOX_CHECK_BROWSER();

	$platform_name = $browser->getPlatform();

	$wp_lightbox_output = '';

	

	if($platform_name=="iPad" || $platform_name=="iPhone")

	{

		$wp_lightbox_output = wp_lightbox_special_anchor_text_external_page_display($link,$width,$height,$text,$title);

		return $wp_lightbox_output;

	}



	if(empty($width) || empty($height))

	{

		$width = $wp_lightbox_config->getValue('wp_lightbox_width');

		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	

	}

	$wp_lightbox_prettyPhoto_rel = 'wp_lightbox_prettyPhoto[iframes]';

	$wp_lightbox_output = <<<EOT

	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor">

	<a title="$title" href="$link?iframe=true&amp;width=$width&amp;height=$height" rel="$wp_lightbox_prettyPhoto_rel">$text</a>	

	</div>

EOT;

	return $wp_lightbox_output;

	

}



function wp_lightbox_display_external_page_display($link,$width,$height,$title,$source)

{

	global $wp_lightbox_config;

	$browser = new WP_LIGHTBOX_CHECK_BROWSER();

	$platform_name = $browser->getPlatform();

	$wp_lightbox_output = '';

	

	if($platform_name=="iPad" || $platform_name=="iPhone")

	{

		$wp_lightbox_output = wp_lightbox_special_external_page_display($link,$width,$height,$source,$title);

		return $wp_lightbox_output;

	}

	

	if(empty($width) || empty($height))

	{

		$width = $wp_lightbox_config->getValue('wp_lightbox_width');

		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	

	}

	$wp_lightbox_prettyPhoto_rel = 'wp_lightbox_prettyPhoto[iframes]';

	$wp_lightbox_output = <<<EOT

	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor">

	<a title="$title" href="$link?iframe=true&amp;width=$width&amp;height=$height" rel="$wp_lightbox_prettyPhoto_rel"><img src="$source" alt="" /></a>

	</div>	

EOT;

	return $wp_lightbox_output;

}



function wp_lightbox_load_prettyPhoto_js()

{

	global $wp_lightbox_config;

	$wp_lightbox_prettyPhoto_animation_speed_value = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_animation_speed');

	if(empty($wp_lightbox_prettyPhoto_animation_speed_value))

	{

		$wp_lightbox_prettyPhoto_animation_speed_value = 'fast'; /* fast/slow/normal */

	}

	$wp_lightbox_prettyPhoto_slideshow_value = 'false'; /* false OR interval time in ms */

	$wp_lightbox_prettyPhoto_autoplay_slideshow_value = 'false'; /* true/false */

	$wp_lightbox_prettyPhoto_opacity_value = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_opacity');

	if(empty($wp_lightbox_prettyPhoto_opacity_value))

	{

		$wp_lightbox_prettyPhoto_opacity_value = '0.80'; /* Value between 0 and 1 */

	}

	$wp_lightbox_prettyPhoto_show_title = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_show_title');

	if(empty($wp_lightbox_prettyPhoto_show_title))

	{

		$wp_lightbox_prettyPhoto_show_title = 'false'; /* true/false */

	}

	$wp_lightbox_prettyPhoto_allow_resize_value = 'true'; /* Resize the photos bigger than viewport. true/false */

	$wp_lightbox_prettyPhoto_default_width_value = '500';

	$wp_lightbox_prettyPhoto_default_height_value = '344';

	$wp_lightbox_prettyPhoto_counter_separator_label_value = '/'; /* The separator for the gallery counter 1 "of" 2 */

	$wp_lightbox_prettyPhoto_theme_value = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_theme');

	if(empty($wp_lightbox_prettyPhoto_theme_value))

	{

		$wp_lightbox_prettyPhoto_theme_value = 'facebook'; /* light_rounded / dark_rounded / light_square / dark_square / facebook */

	}

	$wp_lightbox_prettyPhoto_hideflash_value = 'false'; /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */

	$wp_lightbox_prettyPhoto_wmode_value = 'opaque'; /* Set the flash wmode attribute */

	$wp_lightbox_prettyPhoto_autoplay_value = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_autoplay');

	if(empty($wp_lightbox_prettyPhoto_autoplay_value))

	{

		$wp_lightbox_prettyPhoto_autoplay_value = 'false'; /* Automatically start videos: True/false */

	}

	$wp_lightbox_prettyPhoto_modal_value = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_modal');

	if(empty($wp_lightbox_prettyPhoto_modal_value))

	{

		$wp_lightbox_prettyPhoto_modal_value = 'false'; /* If set to true, only the close button will close the window */

	}

	$wp_lightbox_prettyPhoto_overlay_gallery_value = 'true'; /* If set to true, a gallery will overlay the fullscreen image on mouse over */

	$wp_lightbox_prettyPhoto_keyboard_shortcuts_value = 'true'; /* Set to false if you open forms inside prettyPhoto */

	$wp_lightbox_prettyPhoto_changepicturecallback_value = 'function(){}'; /* Called everytime an item is shown/changed */

	$wp_lightbox_prettyPhoto_callback_value = 'function(){}'; /* Called when prettyPhoto is closed */

	$wp_lightbox_prettyPhoto_markup_value = '<div class="pp_pic_holder"> \

				<div class="ppt">&nbsp;</div> \

				<div class="pp_top"> \

					<div class="pp_left"></div> \

					<div class="pp_middle"></div> \

					<div class="pp_right"></div> \

				</div> \

				<div class="pp_content_container"> \

					<div class="pp_left"> \

					<div class="pp_right"> \

						<div class="pp_content"> \

							<div class="pp_loaderIcon"></div> \

							<div class="pp_fade"> \

								<a href="#" class="pp_expand" title="Expand the image">Expand</a> \

								<div class="pp_hoverContainer"> \

									<a class="pp_next" href="#">next</a> \

									<a class="pp_previous" href="#">previous</a> \

								</div> \

								<div id="pp_full_res"></div> \

								<div class="pp_details clearfix"> \

									<p class="pp_description"></p> \

									<a class="pp_close" href="#">Close</a> \

									<div class="pp_nav"> \

										<a href="#" class="pp_arrow_previous">Previous</a> \

										<p class="currentTextHolder">0/0</p> \

										<a href="#" class="pp_arrow_next">Next</a> \

									</div> \

								</div> \

							</div> \

						</div> \

					</div> \

					</div> \

				</div> \

				<div class="pp_bottom"> \

					<div class="pp_left"></div> \

					<div class="pp_middle"></div> \

					<div class="pp_right"></div> \

				</div> \

			</div> \

			<div class="pp_overlay"></div>';

	$wp_lightbox_prettyPhoto_gallery_markup_value = '<div class="pp_gallery"> \

						<a href="#" class="pp_arrow_previous">Previous</a> \

						<ul> \

							{gallery} \

						</ul> \

						<a href="#" class="pp_arrow_next">Next</a> \

					</div>';

	$wp_lightbox_prettyPhoto_image_markup_value = '<img id="fullResImage" src="" />';

	$wp_lightbox_prettyPhoto_flash_markup_value = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>';

	$wp_lightbox_prettyPhoto_quicktime_markup_value = '<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>';

	$wp_lightbox_prettyPhoto_iframe_markup_value = '<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>';

	$wp_lightbox_prettyPhoto_inline_markup_value = '<div class="pp_inline clearfix">{content}</div>';

	$wp_lightbox_prettyPhoto_custom_markup_value = '';

	

	$wp_lightbox_prettyPhoto_output = <<<EOT

	<script type="text/javascript" charset="utf-8">

	/* <![CDATA[ */

	jQuery.noConflict();

	jQuery(document).ready(function($){

		$(function(){

			$("a[rel^='wp_lightbox_prettyPhoto']").prettyPhoto({

	            animation_speed: '$wp_lightbox_prettyPhoto_animation_speed_value',

				slideshow: $wp_lightbox_prettyPhoto_slideshow_value,

				autoplay_slideshow: $wp_lightbox_prettyPhoto_autoplay_slideshow_value,

				opacity: $wp_lightbox_prettyPhoto_opacity_value, 

				show_title: $wp_lightbox_prettyPhoto_show_title, 

				allow_resize: $wp_lightbox_prettyPhoto_allow_resize_value,

				default_width: $wp_lightbox_prettyPhoto_default_width_value,

				default_height: $wp_lightbox_prettyPhoto_default_height_value,

				counter_separator_label: '$wp_lightbox_prettyPhoto_counter_separator_label_value', 

				theme: '$wp_lightbox_prettyPhoto_theme_value',

				hideflash: $wp_lightbox_prettyPhoto_hideflash_value,

				wmode: '$wp_lightbox_prettyPhoto_wmode_value', 

				autoplay: $wp_lightbox_prettyPhoto_autoplay_value,

				modal: $wp_lightbox_prettyPhoto_modal_value,

				overlay_gallery: $wp_lightbox_prettyPhoto_overlay_gallery_value,

				keyboard_shortcuts: $wp_lightbox_prettyPhoto_keyboard_shortcuts_value,

				changepicturecallback: $wp_lightbox_prettyPhoto_changepicturecallback_value,

				callback: $wp_lightbox_prettyPhoto_callback_value,

				markup: '$wp_lightbox_prettyPhoto_markup_value',

				gallery_markup: '$wp_lightbox_prettyPhoto_gallery_markup_value',

				image_markup: '$wp_lightbox_prettyPhoto_image_markup_value',

				flash_markup: '$wp_lightbox_prettyPhoto_flash_markup_value',

				quicktime_markup: '$wp_lightbox_prettyPhoto_quicktime_markup_value',

				iframe_markup: '$wp_lightbox_prettyPhoto_iframe_markup_value',

				inline_markup: '$wp_lightbox_prettyPhoto_inline_markup_value',

				custom_markup: '$wp_lightbox_prettyPhoto_custom_markup_value'

	          });

		});

	});

	/* ]]> */

	</script>

EOT;

	echo $wp_lightbox_prettyPhoto_output;

}

?>