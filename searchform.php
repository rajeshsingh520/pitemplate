<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="row ">
        <div class="col">
        <input type="search" id="<?php echo $unique_id; ?>" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentyseventeen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        </div>
        <div class="col">
        <button type="submit" class="search-submit btn btn-primary"><?php echo __( 'Search', 'pitemplate' ); ?></span></button>
        </div>
    </div>
</form>