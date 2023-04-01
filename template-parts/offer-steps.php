<?php if (have_rows('offer_steps')) : ?>
  <section class="offer-steps container">
    <?php if ($offer_steps_heading = get_field('offer_steps_heading')) : ?>
      <div class="offer-steps__heading cta__item slide-in-animation">
        <?= $offer_steps_heading; ?>
        <img src="<?= get_template_directory_uri(); ?>/images/tape-on-blue.svg" alt="animated-tape" class="offer-steps__heading-tape">
        <img src="<?= get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="offer-steps__heading-arrow">
      </div>
    <?php endif; ?>

    <div class="row justify-content-center">
      <div class="col-12 col-sm-11 col-lg-10">

        <?php $i = 1; ?>
        <?php while (have_rows('offer_steps')) : the_row(); ?>

          <div class="row offer-steps__step <?php if ($i % 2 == 0) echo 'offer-steps__step--reverse'; ?>">

            <?php if (($title = get_sub_field('title')) && ($text = get_sub_field('text'))) : ?>

              <div class="offer-steps__step-text col-12 col-md-6 cta__item slide-in-animation">
                <h3 class="offer-steps__step-title">
                  <span class="offer-steps__step-title-number">0<?= $i; ?>.</span>
                  <?= $title; ?>
                </h3>
                <p class="offer-steps__step-description">
                  <?= $text; ?>
                </p>
              </div>

            <?php endif; ?>

            <?php if ($image = get_sub_field('image')) : ?>

              <div class="offer-steps__step-image col-12 col-md-6 cta__item slide-in-animation">
                <?= wp_get_attachment_image($image, 'full'); ?>
              </div>

            <?php endif; ?>
          </div>

        <?php $i++;
        endwhile; ?>

      </div>
    </div>
  </section>
<?php endif; ?>