<?php if ((have_rows('associates', 'options')) && $associates_heading = get_field('associates_heading', 'options')) : ?>
  <section class="associates container container--full-hd">
    <div class="row justify-content-center no-gutters">
      <div class="col-11 col-md-10">
        <h2 class="associates__heading cta__item slide-in-animation">
          <?= $associates_heading; ?>
        </h2>
      </div>
      <div class="associates__slider col-12 cta__item slide-in-animation">

        <?php while (have_rows('associates', 'options')) : the_row(); ?>

          <?php if ($logo = get_sub_field('logo')) : ?>

       
              <?= wp_get_attachment_image($logo, 'full', '', ['class' => 'associates__logo']); ?>
            

          <?php endif; ?>

        <?php endwhile; ?>

      </div>
    </div>
  </section>
<?php endif; ?>