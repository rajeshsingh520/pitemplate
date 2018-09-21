<?php
    $mobile_class = ($mobile_show == 0) ? 'd-none d-sm-none d-md-block' : '';

?>
<?php
    /*
        Loads the container-fluid on full tract(0) or full stratched contained(1)
    */
?>
<?php if($width == 0 || $width == 1): ?><div class="container-fluid <?php echo $mobile_class; ?> " id="<?php echo $panel; ?>"><?php endif; ?>
<?php
    /*
        Loads the container on  full stratched contained(1) and container(2)
    */
?>
<?php if($width != 0): ?><div class="container <?php echo $mobile_class; ?> " <?php if($width == 2): ?>id="<?php echo $panel; ?>"<?php endif; ?>><?php endif; ?>
        <div class="row align-items-center py-1">
            <div class="col-12 col-md-6 pi-icon-top">
            <?php if( $phone = get_theme_mod('pitemplate_phone') ): ?>
                <a href="tel:<?php echo $phone; ?>"><i class="fas fa-phone"></i> <?php echo $phone; ?></a>
            <?php endif; ?>
            &nbsp;
            <?php if( $email = get_theme_mod('pitemplate_email') ): ?>
                <a href="mailto:<?php echo $email; ?>"><i class="fas fa-envelope"></i> <?php echo $email; ?></a>
            <?php endif; ?>
            </div>
            <div class="col-12 col-md-6 text-right pi-icon-top">
            <?php pitemplate_social_icons_output(); ?>
            </div>
        </div>
<?php if($width != 0): ?></div><?php endif; ?>

<?php if($width == 0 || $width == 1): ?></div><?php endif; ?>