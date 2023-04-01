<?php if ($portfolio_gallery_photos = get_field('portfolio_gallery_photos')) : ?>

  <section class="portfolio-photo-gallery container">
    <?php if ($portfolio_foto_heading = get_field('portfolio_heading')) : ?>

      <div class="portfolio__heading cta__item slide-in-animation">
        <?= $portfolio_foto_heading; ?>
      </div>

    <?php endif; ?>
    <div class="row">

      <?php foreach ($portfolio_gallery_photos as $photo) : ?>

        <div class="portfolio-photo-gallery__image-container col-6 col-sm-4 col-md-3">
          <?= wp_get_attachment_image($photo, 'portfolio-gallery-image', '', ['class' => 'portfolio-photo-gallery__image']); ?>
        </div>

      <?php endforeach; ?>
    </div>
  </section>

<?php endif; ?>