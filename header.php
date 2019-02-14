<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html <?php language_attributes(); ?>>
<head>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body <?php body_class(); ?>>
<header id="pi-header" style="z-index:10000 !important;">
  <?php pitemplate_top(); ?>
  <?php pitemplate_menu(); ?>
</header>
<?php
  $content_width = get_theme_mod('width_pitemplate_content_layout',1);
?>
<?php if($content_width == 0 || $content_width == 1): ?><main class="container-fluid " id="pitemplate_content"><?php endif; ?>
<?php if($content_width != 0): ?><div class="container" <?php if($content_width == 2): ?>id="pitemplate_content"<?php endif; ?>><?php endif; ?>
