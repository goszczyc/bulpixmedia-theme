<?php
// the query
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if (!is_page_template('page-templates/blog.php')) {
  $paged = false;
}
$i = 0;
$current_id = get_the_ID();
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 6,
  'paged' => $paged,
);
$blog = new WP_Query($args); ?>

<?php if ($blog->have_posts()) : ?>

  <section class="blog container">
    <div class="row justify-content-center">

      <?php if ($blog_heading = get_field('blog_heading')) : ?>
        <div class="blog__heading col-11 col-sm-xs-10 col-sm-9 col-md-7 col-lg-6 cta__item slide-in-animation">
          <?= $blog_heading; ?>
        </div>
      <?php endif; ?>

      <?php if ($paged) : ?>
        <div class="blog__searchbar col-12 col-sm-11 col-md-10 col-lg-8 cta__item slide-in-animation">
          <?php get_search_form(); ?>
        </div>
      <?php endif; ?>

      <div class="col-12 col-sm-11 col-lg-10">
        <div class="blog__cards row justify-content-center">
          <img src="<?= get_template_directory_uri(); ?>/images/camera-corner.svg" alt="" class="blog__cards-bg-camera cta__item slide-in-animation">

          <?php while (($blog->have_posts()) && $i < 3) : $blog->the_post(); ?>

            <?php if ($current_id != get_the_id()) : ?>
              <?php if (!$paged) $i++; ?>
              <div class="blog__card-container col-11 col-xs-6 col-md-4 cta__item slide-in-animation">
                <a href="<?= esc_url(get_permalink()); ?>" class="blog__card">
                  <div class="blog__card-thumbnail">
                    <?= the_post_thumbnail('post-thumb'); ?>
                  </div>
                  <div class="blog__card-info-container">
                    <div class="blog__card-info">
                      <h3 class="blog__card-title">
                        <?= the_title(); ?>
                      </h3>
                      <div class="blog__card-excerpt">
                        <?= the_excerpt(); ?>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            <?php endif; ?>

          <?php endwhile; ?>
          <?php if ($paged) : ?>
            <div class="pagination-nav col-12 cta__item slide-in-animation">
              <?= pagination_bar($blog, 'pagination-nav__numbers'); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- pagination here -->

      <?php wp_reset_postdata(); ?>
    </div>
  </section>

<?php endif; ?>