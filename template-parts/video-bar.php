<?php $add_arg = isset($args['add_arg'])? $args['add_arg'] : '';  ?>
<?php if (($photo_bar = get_field('photo_bar', $add_arg)) || ($video_bar = get_field('video_bar', $add_arg))) : ?>

  <div class="showcase-bar">
    <div class="showcase-bar__overlay"></div>
    <div class="showcase-bar__container" <?php if ($photo_bar) : ?>style="background-image: url('<?= esc_url($photo_bar); ?>');" <?php endif; ?>>
      <?php if ($video_bar) : ?>
        <video autoplay muted loop>
          <source src="<?= esc_url($video_bar); ?>" type="video/mp4">
        </video>
      <?php endif; ?>
    </div>
  </div>

<?php endif; ?>