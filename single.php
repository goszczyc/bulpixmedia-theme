<?php
get_header();
?>

<main class="main">
  <?php get_template_part('/template-parts/banner-post'); ?>
  <?php get_template_part('/template-parts/blog-article'); ?>
  <?php get_template_part('/template-parts/blog-posts'); ?>
  <?php get_template_part('/template-parts/contact'); ?>
</main>

<?php get_footer(); ?>