<?php
  $content_width = get_theme_mod('width_pitemplate_content_layout',1);
?>
<?php if($content_width != 0): ?></div><?php endif; ?>
<?php if($content_width == 0 || $content_width == 1): ?></main><?php endif; ?><!-- #pi-content-->

<?php pitemplate_footer(); ?>

<?php pitemplate_copyright(); ?>

<?php wp_footer(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
<script>
 WebFont.load({
    google: {
      families: ['Roboto:400,700,900,400italic']
    }
  });
</script>
</body>
</html>