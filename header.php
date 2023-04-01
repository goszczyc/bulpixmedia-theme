<!DOCTYPE html>
<html lang="pl">

<head>
  <?php
  $term = get_queried_object();
  $name = $term->name;
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="57x57" href="<?= get_template_directory_uri(); ?>/images/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?= get_template_directory_uri(); ?>/images/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?= get_template_directory_uri(); ?>/images/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= get_template_directory_uri(); ?>/images/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?= get_template_directory_uri(); ?>/images/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?= get_template_directory_uri(); ?>/images/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?= get_template_directory_uri(); ?>/images/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?= get_template_directory_uri(); ?>/images/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri(); ?>/images/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="<?= get_template_directory_uri(); ?>/images/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri(); ?>/images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?= get_template_directory_uri(); ?>/images/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri(); ?>/images/favicon-16x16.png">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <title><?php echo $name = (is_tax('offers')) ? $name : get_the_title(); ?></title>
  <?php wp_head(); ?>

</head>


<body <?php body_class(); ?>>

  <header class="header-container">

    <div class="header container">
      <?php if ($logo = get_field('logo', 'options')) : ?>
        <a href="<?= esc_url(get_home_url()); ?>" class="header__logo">
          <?= wp_get_attachment_image($logo); ?>
        </a>
      <?php endif; ?>
      <div class="header__menus">
        <div class="header__main-menu-container">
          <?php
          
          $menu_class = (is_singular('offer'))? 'header__main-menu header__main-menu--portfolio' : 'header__main-menu';
          wp_nav_menu($args = array(
            'menu' => 'nav-top',
            'menu_class' => $menu_class,
            'container' => ''
          ));
          ?>
          <div class="header__main-menu-bar"></div>
        </div>
        <div class="haeder__lang-menu">
          <?php language_current(); ?>
          <?php language_selector(); ?>
        </div>
      </div>
      <div class="header__burger-container">
        <button class="header__burger">
          <div class="header__burger-bar"></div>
        </button>
        <nav class="header__burger-menus" style="background-image: url('<?= esc_url(get_field('menu_background', 'options')); ?>'), url('<?= esc_url(get_field('menu_background', 'options')); ?>');">
          <?php
          wp_nav_menu($args = array(
            'menu' => 'nav-top',
            'menu_class' => 'header__burger-main-menu',
            'container' => ''
          ));
          ?>
          <div class="header__burger-lang-menu">
            <?php language_current(); ?>
            <?php language_selector(); ?>
          </div>
        </nav>
      </div>
    </div>

  </header>