<?php ($blogSearchTitle = isset($args['id']) ? $args['id'] : ''); ?>
<?php ($title = isset($args['title']) ? $args['title'] : get_the_title($blogSearchTitle)); ?>
<section class="banner-container banner-container--video container container--full-hd">
  <div class="banner__background banner__background--video">
    <video muted autoplay loop class="banner__background-video">
      <source src="<?= esc_url(get_field('banner_video_url')); ?>" type="video/mp4">
    </video>
  </div>

  <div class="banner container">

    <?php if ((have_rows('banner_social', 'options')) && ($banner_social_text = get_field('banner_social_text', 'options'))) : ?>

      <div class="banner__social">

        <p class="banner__social-text"><?= $banner_social_text; ?></p>

        <div class="banner__social-links">

          <?php
          while (have_rows('banner_social', 'options')) :
            the_row();
            if (($social_icon = get_sub_field('social_icon')) && ($social_url = get_sub_field('social_url'))) : ?>

              <a href="<?= $social_url; ?>" class="banner__social-link"><?= wp_get_attachment_image($social_icon, 'full') ?></a>

          <?php
            endif;
          endwhile; ?>

        </div>

      </div>

    <?php endif; ?>

    <h1 class="banner__heading" data-words="<?= $title; ?>, Bulpix Media">
      <strong> <?= $title; ?></strong>
    </h1>

    <?php if (($banner_scroll_text = get_field('banner_scroll_text', 'options')) && $banner_scroll_icon = get_field('banner_scroll_icon', 'options')) : ?>

      <div class="banner__scroll">
        <p class="banner__scroll-text"><?= $banner_scroll_text; ?></p>
        <div class="banner__scroll-icon">
          <?= wp_get_attachment_image($banner_scroll_icon, 'full') ?>
        </div>
      </div>

    <?php endif; ?>

  </div>

</section>