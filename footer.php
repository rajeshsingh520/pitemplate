<?php
  $content_width = get_theme_mod('width_pitemplate_content_layout',1);
?>
<?php if($content_width != 0): ?></div><?php endif; ?>
<?php if($content_width == 0 || $content_width == 1): ?></main><?php endif; ?><!-- #pi-content-->

<?php pitemplate_footer(); ?>

<?php pitemplate_copyright(); ?>

<?php wp_footer(); ?>
<script>

  var font400 = new FontFaceObserver("Open Sans",{weight: 400});
  var font600 = new FontFaceObserver("Open Sans",{weight: 600});
  var font700 = new FontFaceObserver("Open Sans",{weight: 700});
  var font800 = new FontFaceObserver("Open Sans",{weight: 800});

  Promise.all([
    font400.load(),
    font600.load(),
    font700.load(),
    font800.load()
]).then(function () {
    jQuery("body").addClass("open-sans")
  }, function () {
    console.log('Font is not available');
  });
</script>
</body>
</html>
