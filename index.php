<?php get_header(); ?>
<div class="row">
	<div class="col">
		<?php if ( have_posts() ) { ?>
			<?php if ( is_home() && ! is_front_page() ) : ?>
						<?php pi_title(); ?>
			<?php endif; ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'loop' ); ?>
		<?php endwhile; ?>
		<div class="col-12 text-center">
					<?php wpbeginner_numeric_posts_nav(); ?>
		</div>
		<?php }else{ ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php } ?>
	</div>
</div>
<?php get_footer(); ?>
