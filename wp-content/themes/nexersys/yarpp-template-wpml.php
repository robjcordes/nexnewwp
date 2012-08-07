<?php /*
Example template for use with WPML (WP Multilingual, http://wpml.org)
Author: mitcho (Michael Yoshitaka Erlewine)
*/

if (function_exists("icl_register_string")) {
	icl_register_string("Yet Another Related Posts Plugin","related posts header","Related Posts");
	icl_register_string("Yet Another Related Posts Plugin","no related posts message","No related posts.");
}

?>
<div class="info-box">
<h3>Related Information</h3>
<?php if (have_posts()):?>
<ul>
	<?php while (have_posts()) : the_post(); ?>
	<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
	<?php endwhile; ?>
</ul>
<?php else: ?>
<p><?php echo (function_exists("icl_t") ? icl_t("Yet Another Related Posts Plugin","no related posts message","No related posts.") : "No related posts. B") ?></p>
<?php endif; ?>
</div>
