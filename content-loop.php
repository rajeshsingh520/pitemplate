<article id="post-<?php the_ID(); ?>" <?php post_class('row my-2'); ?>>
	<picture>
		<?php pi_thumbnail(); ?>
	</picture>

	<header class="entry-header col-12">
		<?php
			the_title( sprintf( '<h2 class="display-3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		?>
	</header><!-- .entry-header -->

	<main class="entry-content col-12">
		<?php
			the_excerpt();
		?>
	</main><!-- .entry-content -->

	<footer class="entry-footer col-12 text-right">
		<?php edit_post_link( __( 'Edit', 'pitemplate' ), '<span class="edit-link btn btn-small btn-primary">', '</span>' ); ?>
		<a href="<?php echo get_permalink(); ?>" class="btn btn-small btn-primary"><?php echo __('Read more..'); ?></a>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
