<section class="contact-info container">
  <div class="row justify-content-center">
    <div class="contact-info__content col-12 col-sm-10 col-md-9 col-lg-8 col-xl-6">
      <div class="contact-info__heading cta__item slide-in-animation">
        <?= get_the_content(); ?>
      </div>
      <h3><?php _e('Call us or send us a message!', 'bulpix'); ?></h3>
      <?php if (have_rows('contact_info', 'options')) : ?>
        <?php
        while (have_rows('contact_info', 'options')) :
          the_row();
          $type = get_sub_field('type');
          $is_link = get_sub_field('is_link');
          $info = get_sub_field('info');
          $info_url = $info['url'];
          $info_text = $info['title'];
        ?>
          
          <p class="contact-info__link cta__item slide-in-animation">
            <span class="contact-info__link-type">
              <?= $type; ?>:
            </span>

            <?php if ($is_link) : ?>
              <a href="<?= esc_url($info_url); ?>">
                <?= $info_text; ?>
              </a>
              <?php continue; ?>
            <?php endif; ?>

            <?= $info_text; ?>
          </p>

        <?php endwhile; ?>
      <?php endif; ?>
      <img src="<?= get_template_directory_uri(); ?>/images/camera.svg" alt="camera" class="contact-info__image cta__item slide-in-animation">
    </div>
  </div>
</section>