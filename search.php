<?php

/* Template Name: Blog - wwyszukiwanie */

get_header();
?>

<main>
  <?php get_template_part('/template-parts/banner', '', ['id' => 17]); ?>
  <?php
  // the query
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $s = get_search_query();
  $args = array(
    's' => $s,
    'post_type' => 'post',
    'posts_per_page' => 6,
    'paged' => $paged,
  );
  $search = new WP_Query($args); ?>

  <?php if ($search->have_posts()) : ?>

    <section class="blog container">
      <div class="row justify-content-center">

        <?php if ($blog_heading = get_field('blog_heading', 17)) : ?>
          <div class="blog__heading col-11 col-sm-xs-10 col-sm-9 col-md-7 col-lg-6">
            <?= $blog_heading; ?>
          </div>
        <?php endif; ?>

        <div class="blog__searchbar col-12 col-sm-11 col-md-10 col-lg-8">
          <?php get_search_form(); ?>
        </div>

        <div class="col-12 col-sm-11 col-lg-10">
          <div class="blog__cards row justify-content-center">

            <?php while ($search->have_posts()) : $search->the_post(); ?>

              <div class="blog__card-container col-11 col-xs-6 col-md-4">
                <a href="<?= esc_url(get_permalink()); ?>" class="blog__card">
                  <?= the_post_thumbnail('full', ['class' => 'blog__card-thumbnail']); ?>
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

            <?php endwhile; ?>
            <div class="blog__cards-nav col-12">
              <?= pagination_bar($search, 'blog__cards-nav-numbers'); ?>
              <?php   ?>
            </div>
          </div>
        </div>

        <!-- pagination here -->

        <?php wp_reset_postdata(); ?>
      </div>
    </section>

  <?php endif; ?>
</main>

<?php
get_footer();
?>