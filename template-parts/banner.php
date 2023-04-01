<?php ($blogSearchTitle = isset($args['id']) ? $args['id'] : ''); ?>
<?php $page_id = (isset($args['page_id'])) ? $args['page_id'] : ''; ?>
<?php $banner_bg_url = (isset($args['banner_bg'])) ? $args['banner_bg'] : false; ?>
<?php ($title = isset($args['title']) ? $args['title'] : get_the_title($blogSearchTitle)); ?>
<section class="banner-container container container--full-hd">

  <?php if ($banner_background = get_field('banner_background', $page_id)) : ?>
    <div class="banner__background" style="background-image: url('<?= $banner_background; ?>'"></div>
  <?php endif; ?>
  <?php if ($banner_bg_url) : ?>
    <div class="banner__background darken" style="background-image: url('<?= esc_url($banner_bg_url); ?>'"></div>
  <?php endif; ?>

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
      <strong> // <?= $title; ?></strong>
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