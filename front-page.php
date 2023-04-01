<?php
/* Template Name: Strona Główna */
get_header();

?>
<main class="main">
  <?php get_template_part('/template-parts/banner-video'); ?>
  <?php get_template_part('/template-parts/offer-icons-part'); ?>
  <?php get_template_part('/template-parts/realizations-slider'); ?>
  <?php get_template_part('/template-parts/about-us'); ?>
  <?php get_template_part('/template-parts/offer-part'); ?>
  <?php get_template_part('/template-parts/contact'); ?>
  <?php get_template_part('/template-parts/associates'); ?>
</main>
<?php get_footer(); ?>