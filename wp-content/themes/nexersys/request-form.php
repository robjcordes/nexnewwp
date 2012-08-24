<?php

/*
Template Name: Request Form 
*/
get_header('form'); ?>
<div class="clear">&nbsp;</div>
	<!-- content -->
	<article id="content" class="grid_12">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<article class="content-box">
					<!-- <h3><?php the_title();?></h3> -->
					<div class="content">
						<?php the_content();?>
					</div>
				</article>
			<?php endwhile;?>
		<?php else : ?>
			<article class="content-box">
				<h3>Not Found</h3>
				<div class="content">
					<p>Sorry, but you are looking for something that isn't here.</p>
				</div>
			</article>
		<?php endif; ?>
	</article>
		<div class="clear">&nbsp;</div>
<?php get_footer(); ?>