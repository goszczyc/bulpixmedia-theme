<?php $id = get_the_ID(); ?>
<div class="realization container">
  <div class="row justify-content-center">
    <div class="realization__content col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
      <?= get_the_content(); ?>
    </div>
  </div>

  <div class="realization__video cta__item slide-in-animation  row no-gutters">
    <?php if (get_field('is_video_thumbnail')) : ?>
      <?php if ($video = get_field('video_thumbnail')) : ?>

        <div class="col-12 col-sm-8 col-md-8 col-lg-9 offset-lg-1">
          <div class="realization__video-container">
            <?= $video; ?>
          </div>
        </div>

        <?php if (have_rows('video_description')) : ?>

          <div class="col-sm-4 col-lg-2">
            <ul class="realization__video-description">
              <?php while (have_rows('video_description')) : the_row(); ?>
                <?php if (($type = get_sub_field('type')) && ($creator = get_sub_field('creator'))) : ?>
                  <li class="realization__video-description-executor"><span class="realization__video-description-type"><?= $type; ?>: </span>&nbsp;<?= $creator; ?></li>
                <?php endif; ?>
              <?php endwhile; ?>
            </ul>
          </div>

        <?php endif; ?>

      <?php endif; ?>
    <?php endif; ?>
  </div>
</div>



<?php if (have_rows('offer_showcase')) :
  $component_name = '';
  $field = ''; ?>

  <div class="showcase-realization">

    <?php while (have_rows('offer_showcase')) {
      the_row();
      if (get_row_layout() == 'movie') {
        $component_name = 'movie';
        $field = 'movie_content';
      } elseif (get_row_layout() == 'photo_gallery') {
        $component_name = 'photo_gallery';
        $field = 'photo_gallery_content';
      } elseif (get_row_layout() == 'big_photo') {
        $component_name = 'big_photo';
        $field = 'big_photo_content';
      } elseif (get_row_layout() == 'photos_before_after') {
        $component_name = 'photos_before_after';
        $field = 'photos_before_after_content';
      } elseif (get_row_layout() == 'few_photos') {
        $component_name = 'few_photos';
        $field = 'few_photos_content';
      } elseif (get_row_layout() == 'offer_description') {
        $component_name = 'offer_description';
        $field = 'offer_description_content';
      }

      get_template_part('/components/' . $component_name, '', ['sub_field' => $field]);
    }
    ?>

  </div>

<?php endif; ?>