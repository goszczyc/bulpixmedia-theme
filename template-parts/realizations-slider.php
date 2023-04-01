<?php if (have_rows('realizations_slider')) : ?>
  <section class="chosen-realizations-container container container--full-hd cta__item slide-in-animation">
    <div class="row">
      <div class="chosen-realizations col-12 col-sm-11 offset-sm-1">
        <div class="chosen-realizations__heading">
          <?php if ($realiations_slider_heading = get_field('realizations_slider_heading')) : ?>
            <h2 class="chosen-realizations__heading-title"><?= $realiations_slider_heading; ?></h2>
          <?php endif; ?>
          <?php if ($realizations_slider_link = get_field('realizations_slider_link')) :
            $url = $realizations_slider_link['url'];
            $title = $realizations_slider_link['title'];
          ?>
            <a href="<?= esc_url($url); ?>" class="chosen-realizations__heading-link"><?= $title; ?></a>
          <?php endif; ?>
        </div>
        <div class="chosen-realizations__slider">
          <div class="chosen-realizations__arrow chosen-realizations__arrow--prev">
            <img src="<?= get_template_directory_uri(); ?>/images/arrow-prev.svg" alt="">
          </div>
          <div class="chosen-realizations__arrow chosen-realizations__arrow--next">
            <img src="<?= get_template_directory_uri(); ?>/images/arrow-next.svg" alt="">
          </div>
          <div id="realizations-slider">
            <?php while (have_rows('realizations_slider')) : the_row(); ?>
              <div class="chosen-realizations__slide">
                <?php $id = get_sub_field('link'); ?>
                <?php if ($id) : ?>
                  <div class="chosen-realizations__slide-thumb">
                    <?php $realization_video = get_field('video_thumbnail', $id); ?>
                    <?php
                    if (!$realization_video) : ?>
                      <h3 class="chosen-realizations__slide-title"> <?= get_the_title($id); ?></h3>
                    <?php echo get_the_post_thumbnail($id);
                    else :
                      echo $realization_video;
                    endif;
                    ?>
                  </div>
                  <a href="<?= esc_url(get_permalink($id)); ?>" class="chosen-realizations__slide-link"><?php _e('See realization', 'bulpix'); ?></a>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>