<article id="post-<?php the_ID(); ?>" <?php post_class('row my-2'); ?>>
	<picture>
		<?php pi_thumbnail(); ?>
	</picture>

	<header class="entry-header col-12">
		<?php
			the_title( '<h2 class="display-3">', '</h2>' );
		?>
	</header><!-- .entry-header -->

	<main class="entry-content col-12">
		<?php
			the_content();
		?>
	</main><!-- .entry-content -->

	<footer class="entry-footer col-12 text-right">
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link btn btn-small btn-primary">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
