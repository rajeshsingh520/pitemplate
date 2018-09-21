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
        <div class="row align-items-top py-5">
            <?php dynamic_sidebar('footer'); ?>
        </div>
<?php if($width != 0): ?></div><?php endif; ?>

<?php if($width == 0 || $width == 1): ?></div><?php endif; ?>