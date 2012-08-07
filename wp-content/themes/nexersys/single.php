<?php get_header(); ?>
<div class="clear">&nbsp;</div>
	<!-- content -->
	<article id="content" class="grid_8">
		<?php if (is_active_sidebar('carousel-post-sidebar')) dynamic_sidebar('carousel-post-sidebar'); ?>
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<article class="content-box">
					<h3><?php the_title();?></h3>
					<div class="content">
						<?php the_content();?>
					</div>
				</article>
				<!-- tab box -->
				<div class="tab-box">
					<?php the_field('custom_text');?>
				</div>
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
