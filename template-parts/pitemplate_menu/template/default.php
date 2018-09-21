<?php
    $mobile_class = ($mobile_show == 0) ? 'd-none d-sm-none d-md-block' : '';

    $shrink_class = ($shrink == 1)? 'shrink' : 'no-shrink';
?>
<?php
    /*
        Loads the container-fluid on full tract(0) or full stratched contained(1)
    */
?>
<?php if($width == 0 || $width == 1): ?><div class="container-fluid <?php echo $mobile_class; ?> <?php echo $shrink_class; ?>" id="<?php echo $panel; ?>" data-sticky-class="is-sticky" data-sticky-wrap="true"><?php endif; ?>
<?php
    /*
        Loads the container on  full stratched contained(1) and container(2)
    */
?>
<?php if($width != 0): ?><div class="container <?php echo $mobile_class; ?> <?php echo $shrink_class; ?>" <?php if($width == 2): ?>id="<?php echo $panel; ?>"<?php endif; ?> data-sticky-class="is-sticky" data-sticky-wrap="true"><?php endif; ?>
        <div class="row py-2 align-items-center">
            <div class="col-6 col-md-3">
                <?php
                    if ( function_exists( 'the_custom_logo' ) ) {
                ?>
                <a itemprop="url" class="logo equal-height" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        echo '<img src="'.$image[0].'" class="img-fluid custom-logo"/>';
                ?>
                </a>
                <?php
                    }
                ?>
            </div>
            <div class="col-6 d-block d-sm-block d-md-none text-right">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            </div>
            <div class="col-12 col-md-9">
            <nav class="navbar navbar-expand-md navbar-light bg-faded py-0 px-0">
            <?php
            wp_nav_menu([
                'menu'            => 'primary',
                'theme_location'  => 'primary',
                'container'       => 'div',
                'container_id'    => 'bs4navbar',
                'container_class' => 'collapse navbar-collapse',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav ml-auto',
                'depth'           => 2,
                'fallback_cb'     => 'bs4navwalker::fallback',
                'walker'          => new bs4navwalker()
            ]);
            ?>
            </nav>
            </div>
        </div>
<?php if($width != 0): ?></div><?php endif; ?>

<?php if($width == 0 || $width == 1): ?></div><?php endif; ?>