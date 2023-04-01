<?php
$sub_field = (isset($args['sub_field'])) ? $args['sub_field'] : '';
?>

<?php if (have_rows($sub_field)) : ?>


  <div class="showcase-realization__before-after container">
    <div class="row">
      <?php while (have_rows($sub_field)) : the_row();
        $photo_before = get_sub_field('photo_before');
        $photo_after = get_sub_field('photo_after');
      ?>
        <div class="showcase-realization__image-container col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 cta__item slide-in-animation">
          <div class="showcase-realization__image">
            <div class="showcase-realization__image-after" style="background-image: url('<?= esc_url($photo_after); ?>')">
              <span><?php _e('after', 'bulpix') ?></span>
            </div>
            <div class="showcase-realization__image-slider-thumb"></div>
            <input type="range" min="0" max="100" value="50" id="before-after" class="showcase-realization__image-slider">
            <div class="showcase-realization__image-before" style="background-image: url('<?= esc_url($photo_before); ?>')"><span><?php _e('before', 'bulpix') ?></span></div>
          </div>
        </div>

      <?php endwhile; ?>
    </div>
  </div>

<?php endif; ?>