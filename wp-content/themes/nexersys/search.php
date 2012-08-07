<?php get_header(); ?>
<div class="clear">&nbsp;</div>
	<!-- content -->
	<article id="content" class="grid_8">
		<?php if (is_active_sidebar('carousel-post-sidebar')) dynamic_sidebar('carousel-post-sidebar'); ?>
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<article class="content-box">
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<div class="content">
						<?php the_excerpt();?>
					</div>
				</article>
			<?php endwhile;?>
			<?php if(get_next_posts_link() || get_previous_posts_link()):?>
				<article class="content-box">
					<div class="next"><?php next_posts_link('Older Entries &raquo;') ?></div>
					<div class="prev"><?php previous_posts_link('&laquo; Newer Entries') ?></div>
				</article>
			<?php endif; ?>
		<?php else : ?>
			<article class="content-box">
				<h3>Not Found</h3>
				<div class="content">
					<p> Try a different search?</p>
					<?php get_search_form(); ?>
				</div>
			</article>
		<?php endif; ?>
	</article>
	<?php if (is_active_sidebar('posts-sidebar')):?>
		<aside id="sidebar" class="grid_4">
			<?php dynamic_sidebar('posts-sidebar'); ?>
			<?php query_posts('post_type=grid&posts_per_page=1');?>
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<blockquote>
						<div class="holder">
							<div class="frame">
								<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
								<?php the_excerpt();?>
								<?php if($text = get_post_meta($post->ID, 'author', true)):?><cite> <?php echo $text;?></cite><?php endif;?>
							</div>
						</div>
					</blockquote>
				<?php endwhile;?>
			<?php endif;?>
			<?php wp_reset_query();?>
		</aside>
	<?php endif; ?>
	<div class="clear">&nbsp;</div>

<?php get_footer(); ?>
