<section class="offer-assuring container container--full-hd">
  <img class="offer-assuring__bg" src="<?= get_template_directory_uri(); ?>/images/camera-on-tripod.svg" alt="">
  <div class="row">
    <div class="container container--full-hd">
      <div class="row">
        <?php if ($assuring_heading = get_field('assuring_heading')) : ?>
          <div class="offer-assuring__heading col-12 col-sm-10 offset-sm-1 col-md-10 col-lg-8 cta__item slide-in-animation">
            <?= $assuring_heading; ?>
          </div>
          <?php if (have_rows('assuring_list')) : ?>

            <ul class="offer-assuring__list col-11 col-sm-10 offset-1 col-md-10 col-lg-8 row cta__item">

              <?php while (have_rows('assuring_list')) : the_row(); ?>

                <?php if ($assuring_list_item = get_sub_field('assuring_list_item')) : ?>
                  <li class="offer-assuring__list-item col-12 col-sm-6 cta__item slide-in-animation">
                    <?= $assuring_list_item; ?>
                  </li>
                <?php endif; ?>

              <?php endwhile; ?>

            </ul>

          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>