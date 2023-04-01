<?php

/* Template Name: Portfolio */

$portfolio_page_id = 15;
$current_lang = apply_filters( 'wpml_current_language', NULL );
if($current_lang == 'en') $portfolio_page_id = 1958;

get_header();
?>

<main class="main">
  <?php get_template_part('/template-parts/banner', '', ['page_id' => $portfolio_page_id]); ?>
  <?php if((!is_page(497)) && (!is_page(1964))) get_template_part('/template-parts/portfolio', '', ['portfolio_page' => true, 'page_id' => $portfolio_page_id]); ?>
  <?php get_template_part('/template-parts/portfolio-foto-cards'); ?>
  <?php get_template_part('/template-parts/offer-part', '', ['page_id' => $portfolio_page_id]); ?>
  <?php get_template_part('/template-parts/contact'); ?>
  <?php get_template_part('/template-parts/associates'); ?>
</main>

<?php get_footer(); ?>