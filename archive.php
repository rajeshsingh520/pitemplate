<?php get_header(); ?>
<?php if ( have_posts() ) { ?>
    <?php pi_title(); ?>
    <?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'content', 'loop' ); ?>
<?php endwhile; ?>
<div class="col-12 text-center">
			<?php wpbeginner_numeric_posts_nav(); ?>
</div>
<?php }else{ ?>
	<?php get_template_part( 'content', 'none' ); ?>
<?php } ?>
<?php get_footer(); ?>
