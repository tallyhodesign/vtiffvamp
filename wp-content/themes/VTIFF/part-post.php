<?php $show_full_post = of_get_option('ttrust_post_show_full'); ?>
<?php $show_thumb_on_home = of_get_option('ttrust_post_show_featured_image_on_home'); ?>
<?php $post_show_date = of_get_option('ttrust_post_show_date'); ?>
<? $pc = ($post_show_date) ? "" : "noDate"; ?>
<div <?php post_class($pc); ?>>	
	<?php if($post_show_date) : ?>
	<div class="date">
		<span class="day"><?php the_time('j');?></span>
		<span class="month"><?php the_time('F');?></span>
	</div>
	<?php endif; ?>	
	<div class="inside">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" ><?php the_title(); ?></a></h2>
	<div class="meta clearfix">
		<?php $post_show_author = of_get_option('ttrust_post_show_author'); ?>
		<?php $post_show_category = of_get_option('ttrust_post_show_category'); ?>
		<?php $post_show_comments = of_get_option('ttrust_post_show_comments'); ?>

		<?php if($post_show_author) { _e('by ', 'themetrust'); the_author_posts_link(); }?>		 
		<?php if($post_show_category) { _e('in', 'themetrust'); ?> <?php the_category(', '); } ?>
		<?php if(($post_show_author || $post_show_date || $post_show_category) && $post_show_comments){ echo " | "; } ?>

		<?php if($post_show_comments) : ?>
			<a href="<?php comments_link(); ?>"><?php comments_number(__('No Comments', 'themetrust'), __('One Comment', 'themetrust'), __('% Comments', 'themetrust')); ?></a>
		<?php endif; ?>
	</div>	
	
	<?php if($show_full_post && !is_page_template('page-home.php')) : ?>
		<?php the_content(); ?>		
	<?php else: ?>
		<?php if(is_page_template('page-home.php')) : ?>
			<?php if($show_thumb_on_home) : ?>						
			<?php get_template_part( 'part-post-thumb'); ?>
			<?php endif; ?>
		<?php else: ?>		
			<?php get_template_part( 'part-post-thumb'); ?>
		<?php endif; ?>		
		<?php the_excerpt(); ?>
		<?php more_link(); ?>
	<?php endif; ?>												
	</div>
	
</div>