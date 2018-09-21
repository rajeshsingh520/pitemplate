<?php
    /*
        Loads the container-fluid on full tract(0) or full stratched contained(1)
    */
?>
<?php if($width == 0 || $width == 1): ?><div class="container-fluid " id="<?php echo $panel; ?>"><?php endif; ?>
<?php
    /*
        Loads the container on  full stratched contained(1) and container(2)
    */
?>
<?php if($width != 0): ?><div class="container  " <?php if($width == 2): ?>id="<?php echo $panel; ?>"<?php endif; ?>><?php endif; ?>
        <div class="row align-items-center py-2">
            <div class="col-12 d-flex text-right justify-content-end">
            <span><?php echo $copyright_msg; ?></span>&nbsp;&nbsp;
            <?php pitemplate_social_icons_output(); ?>
            </div>
        </div>
<?php if($width != 0): ?></div><?php endif; ?>

<?php if($width == 0 || $width == 1): ?></div><?php endif; ?>