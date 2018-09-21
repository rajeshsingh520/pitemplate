<?php get_header(); ?>
<?php if (have_posts()) :  the_post(); ?>
		<article class="row">
			<div class="col-12">
			<?php pi_title(); ?>
			<?php the_content("",true,""); ?> 
			</div>
		</article>
<?php  endif; ?>
<?php get_footer(); ?>