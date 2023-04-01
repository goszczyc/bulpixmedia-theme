<?php
$page_id = (isset($args['page_id']))? $args['page_id'] : '';
$current_page_id = get_the_ID();

$args = array(
  'post_type'      => 'page',
  'posts_per_page' => -1,
  'post_parent'    => 497,
  'order'          => 'ASC',
  'orderby'        => 'menu_order'
);

$parent = new WP_Query($args);
?>


<?php if ($parent->have_posts()) : ?>
  <section class="portfolio-photo container">

    <?php if ($portfolio_foto_heading = get_field('portfolio_foto_heading')) : ?>

      <div class="portfolio__heading cta__item slide-in-animation">
        <?= $portfolio_foto_heading; ?>
      </div>

    <?php endif; ?>

    <div class="portfolio-photo__cards row justify-content-center">

      <?php while ($parent->have_posts()) : $parent->the_post(); ?>
        <?php if (get_the_id() != $current_page_id) : ?>
          <div class="col-12 col-sm-6 col-md-4 cta__item slide-in-animation">
            <a href="<?= esc_url(get_permalink()); ?>" class="portfolio-photo__card">
              <?= get_the_post_thumbnail('', 'full', ['class' => 'portfolio-photo__card-thumbnail']); ?>
              <h3 class="portfolio-photo__card-title"> <?= get_the_title(); ?></h3>
            </a>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>

    </div>

  </section>
<?php endif; ?>