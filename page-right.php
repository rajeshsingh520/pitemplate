<?php
/*
	Template Name: Right sidebar
*/
?>
<?php get_header(); ?>
<div class="row">
		<div class="col">
			<?php if ( have_posts() ) { ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content','page'); ?>
			<?php endwhile; ?>
			<?php }else{ ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php } ?>
		</div>
		<?php get_template_part('sidebar'); ?>
</div>
<?php get_footer(); ?>
