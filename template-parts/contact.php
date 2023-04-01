<?php 
$contact_form_shortcode = '[contact-form-7 id="130" title="Formularz kontaktowy - pl"]';
$current_lang = apply_filters( 'wpml_current_language', NULL);
if(($current_lang == 'en') || ($current_lang == 'uk')) $contact_form_shortcode = '[contact-form-7 id="1861" title="Formularz kontaktowy - en"]';
?>

<section class="contact container">
  <div class="row">

    <?php if ($contact_image = get_field('contact_image', 'options')) : ?>

      <div class="col-12 col-md-4 col-lg-4-5 col-xl-3-5 offset-lg-0-5 contact__image cta__item slide-in-animation">
        <?= wp_get_attachment_image($contact_image, 'full'); ?>
      </div>

    <?php endif; ?>

    <div class="contact__form col-12 col-md-8 col-lg-7-5 offset-lg-0-5 col-xl-6 cta__item slide-in-animation">
      <?php if ($contact_heading = get_field('contact_heading', 'options')) : ?>

        <div class="contact__form-heading">
          <?= $contact_heading; ?>

          <?php if ($contact_arrow = get_field('contact_arrow', 'options')) : ?>
            <?= wp_get_attachment_image($contact_arrow, 'full', '', ['class' => 'contact__form-arrow']); ?>
          <?php endif; ?>

        </div>

      <?php endif; ?>
      <?= do_shortcode($contact_form_shortcode); ?>
    </div>
  </div>
</section>
<div class="contact__form-accept-text"></div>