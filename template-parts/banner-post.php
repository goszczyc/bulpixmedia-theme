<section class="banner-container container container--full-hd">

  <?php if ($banner_background = get_field('banner_background')) : ?>
    <div class="banner__background" style="background-image: url('<?= get_field('banner_background'); ?>'"></div>
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

    <div class="banner__heading" data-words="<?= the_title(); ?>, Bulpix Media">
      <strong>
        // <?= get_the_title(17); ?> <span>
          <h1 class="banner__subheading"> / <?= the_title(); ?></h1>
        </span>
      </strong>
    </div>

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