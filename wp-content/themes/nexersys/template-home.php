<?php
/*
Template Name: Home Template
*/
get_header(); ?>
<?php if (have_posts()) : ?>
	<?php if (is_active_sidebar('carousel-sidebar')) dynamic_sidebar('carousel-sidebar'); ?>	
	<div class="clear">&nbsp;</div>
	<?php if (is_active_sidebar('section-one-sidebar')) dynamic_sidebar('section-one-sidebar'); ?>
	<?php if (is_active_sidebar('section-two-sidebar')) dynamic_sidebar('section-two-sidebar'); ?>
	<div class="clear">&nbsp;</div>
	<?php if (is_active_sidebar('promo-sidebar')):?>
		<div class="grid_12 promo">
			<?php dynamic_sidebar('promo-sidebar'); ?>
		</div>
	<?php endif; ?>
<?php else : ?>
	<h1>Not Found</h1>
	<p>Sorry, but you are looking for something that isn't here.</p>
<?php endif; ?>
<div class="clear">&nbsp;</div>
<?php get_footer(); ?>
