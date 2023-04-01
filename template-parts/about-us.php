<?php 
$about_page_id = 10; 
$current_lang = apply_filters( 'wpml_current_language', NULL );
if($current_lang == 'en') $about_page_id = 1875;
?>
<section class="about-us container container--full-hd cta__item slide-in-animation">
  <div class="row">

    <?php if ($about_us_heading = get_field('about_us_heading', $about_page_id)) : ?>
      <div class="about-us__heading col-12">
        <?= $about_us_heading; ?>
        <img src="<?= get_template_directory_uri();?>/images/arrow.svg" alt="arrow" class="about-us__heading-arrow">
        <img src="<?= get_template_directory_uri();?>/images/tape-on-blue.svg" alt="tape-on-blue-circle" class="about-us__heading-tape">
      </div>
      <?php endif; ?>
      
      <?php if (($about_us_text = get_field('about_us_text', $about_page_id)) && ($about_us_photo = get_field('about_us_photo'))) : ?>
        
        <div class="about-us__text col-12 col-sm-10 offset-sm-1 col-md-5 col-lg-4">
          <?= $about_us_text; ?>
      </div>

      <div class="about-us__photo col-12 col-md-5 offset-md-1
      col-lg-6 col-xl-5 offset-xl-2">
        <?= wp_get_attachment_image($about_us_photo, 'full'); ?>
      </div>

    <?php endif; ?>

  </div>
</section>