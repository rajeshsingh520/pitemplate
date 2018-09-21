<?php get_header(); ?>
<div class="row">
	<div class="col">
		<header class="page-header">
				<?php if ( have_posts() ) : ?>
					<h1 class="display-1"><?php printf( __( 'Search Results for: %s', 'pitemplate' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php else : ?>
					<h1 class="display-1"><?php _e( 'Nothing Found', 'pitemplate' ); ?></h1>
				<?php endif; ?>
		</header>
		<?php if ( have_posts() ) { ?>
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
