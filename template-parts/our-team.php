<section class="our-team container container--full-hd">
  <div class="row justify-content-center">
    <?php if ($our_team_heading = get_field('our_team_heading')) : ?>
      <div class="our-team__heading col-12 col-sm-10 col-lg-7 cta__item slide-in-animation">
        <?= $our_team_heading; ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="row">
    <?php if (have_rows('our_team')) :  $i = 1; ?>
      <?php while (have_rows('our_team')) : the_row(); ?>
        <?php
        $photo = get_sub_field('photo');
        $name = get_sub_field('name');
        $position = get_sub_field('position');
        $description = get_sub_field('description');
        ?>

        <!-- <?php if ($description) : ?>
          <div class="our-team__member-description-overlay" data-member="<?= $name; ?>">
            <div class="our-team__member-description">
              <?= $description; ?>
              <div class="our-team__member-description-exit"></div>
            </div>
          </div>
        <?php endif; ?> -->

        <div class="our-team__member col-10 offset-1 col-sm-6 offset-sm-0 col-md-4 offset-md-<?= $i; ?> cta__item slide-in-animation">

          <?php if ($photo && $name && $position) : ?>

            <div class="our-team__member-photo">
              <?= wp_get_attachment_image($photo, 'full'); ?>
              <button class="our-team__member-expand-btn"><img src="<?= get_template_directory_uri(); ?>/images/expand.svg" alt=""></button>
              <div class="our-team__member-description" data-name="<?= $name; ?>">
                <?= $description; ?>
              </div>
            </div>
            <div>
              <h4 class="our-team__member-name">
                <?= $name; ?>
              </h4>
              <p class="our-team__member-position">
                <?= $position; ?>
              </p>
            </div>

          <?php endif; ?>


        </div>
      <?php $i++;
        if ($i > 2) $i = 1;
      endwhile; ?>
    <?php endif; ?>

  </div>
</section>