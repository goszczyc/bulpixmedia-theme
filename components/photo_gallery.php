<?php
$sub_field = (isset($args['sub_field'])) ? $args['sub_field'] : '';
?>

<?php if ($images = get_sub_field($sub_field)) : ?>
  <div class="showcase-realization__gallery container">

    <div class="row">
      <?php
      $i = 0;
      foreach ($images as $image) : ?>

        <div class="showcase-realization__gallery-photo cta__item slide-in-animation col-12 col-sm-6 col-md-4 col-lg-3" data-index=<?= $i; ?>>
          <?= wp_get_attachment_image($image, 'gallery-image-full', '', ['class' => 'gallery-photo']); ?>
          <!-- @todo: zgłoszenie z maila - tymczasow e rozwiazanie problemu zdjec w galerii | przydałoby sie ładować miniaturke w rozmiarze gallery-image a podglad wiekszy np gallery-image-full -->
        </div>

      <?php
        $i++;
      endforeach;
      ?>
    </div>

  </div>
<?php endif; ?>