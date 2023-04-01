<?php
$sub_field = (isset($args['sub_field'])) ? $args['sub_field'] : '';
?>

<?php if (have_rows($sub_field)) : ?>
  <div class="container">
    <div class="showcase-realization__photos row">
      <?php while (have_rows($sub_field)) : the_row(); ?>
        <?php if ($photo = get_sub_field('one_photo')) : ?>
          <div class="col-12 col-md-4 cta__item slide-in-animation">
            <div class="showcase-realization__photo-container">
              <?= wp_get_attachment_image($photo, 'full', '', ['class' => 'showcase-realization__img']); ?>
            </div>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
    </div>
  </div>
<?php endif; ?>