<?php

/* Template Name: Cookies */

get_header();
?>

<main class="main">
  <?php get_template_part('/template-parts/banner'); ?>
  <div class="cookies-policy container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-11 col-md-10 col-lg-8 col-xl-8">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>