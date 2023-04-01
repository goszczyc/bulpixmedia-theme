<?php

// get url for ajax paging
global $wp;
$base = home_url($wp->request);

$port_page_id = 15;
$port_film_page_id = 495;
$current_language = apply_filters( 'wpml_current_language', NULL );
if($current_language == 'en') {
  $port_page_id = 1958;
  $port_film_page_id = 1979;
} 

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$page_id = (isset($args['page_id'])) ? $args['page_id'] : '';
$offer_cat = (isset($args['offer_cat'])) ? $args['offer_cat'] : false;
$no_paging = (isset($args['no_paging'])) ? $args['no_paging'] : false;
$is_portfolio_page = (isset($args['portfolio_page'])) ? $args['portfolio_page'] : false;


if ($is_portfolio_page) {
    $args = array(
      'post_type' => 'offer',
      'posts_per_page' => 3,
      'paged' => $paged,
      'order' => 'ASC',
      'tax_query' => array(
        array(
          'taxonomy' => 'offers',
          'field' => 'slug',
          'terms' => 'film'
        )
      )
    );
  } elseif(str_contains($base, 'portfolio/page')) {
    $basename_cat = 'portfolio';
  }


// query arguments for chosen offer page



if ($offer_cat) {
  $args = array(
    'post_type' => 'offer',
    'posts_per_page' => 3,
    'paged' => $paged,
    'order' => 'ASC',
    'tax_query' => array(
      array(
        'taxonomy' => 'offers',
        'field' => 'slug',
        'terms' => $offer_cat
      )
    )
  );
}
$offer = new WP_Query($args);

$count = $offer->found_posts;
?>

<section class="portfolio container container--full-hd">

  <?php if (!is_tax()) : ?>
    <input id="base" type="hidden" name="base" value="<?= $base; ?>">
  <?php endif; ?>

  <?php if ($portfolio_heading = get_field('portfolio_heading', $page_id)) : ?>

    <div class="portfolio__heading cta__item slide-in-animation">
      <?= $portfolio_heading; ?>

      <?php if ((!is_tax()) && ((is_page($port_film_page_id)) || (is_page($port_page_id)))) : ?>
        <div class="portfolio__switch-container">
          <input type="checkbox" name="portfolio-switch" id="portfolio-switch" class="portfolio__switch">
          <label class="portfolio__switch-label" for="portfolio-switch" data-hide="<?php _e('Hide miniatures', 'bulpix') ?>" data-show="<?php _e('Show miniatures', 'bulpix') ?>"><?php _e('Show miniatures', 'bulpix') ?></label>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <div class="portfolio__loader-container">
    <div class="portfolio__loader"></div>
  </div>


  <?php if (($offer->have_posts()) && ((is_page($port_film_page_id)) || (is_page($port_page_id)))) : ?>
    <div class="portfolio__cards">
      <div class="row">
        <?php
        $desc_position = 'text-left';
        while ($offer->have_posts()) : $offer->the_post();
        ?>
          <div class="portfolio__card portfolio__card--<?= $desc_position; ?> col-12 grid-container ">
            <div class="portfolio__card-description">
              <h3 class="portfolio__card-title">
                <?= get_the_title(); ?>
              </h3>
              <p class="portfolio__card-excerpt">
                <?= get_the_excerpt(); ?>
              </p>
              <a href="<?= esc_url(get_permalink()); ?>" class="portfolio__card-read-more">
                <?php _e('See more', 'bulpix'); ?>
              </a>
            </div>
            <div class="portfolio__card-thumbnail">
              <?php $realization_video = get_field('video_thumbnail'); ?>
              <?php
              if (!$realization_video) {
                echo get_the_post_thumbnail();
              } else {
                echo $realization_video;
              }
              ?>
              <?php
              ?>
            </div>
          </div>
        <?php
          ($desc_position == 'text-left') ? $desc_position = 'text-right' : $desc_position = 'text-left';
        endwhile; ?>
      </div>
    </div>
    <?php if ($count > 3 && is_tax()) : ?>
      <?php if ($see_more = get_field('see_more', $page_id)) : ?>
        <div class="row justify-content-center">
          <a href="<?= $see_more['url'] ?>" class="btn btn--inverse">
            <?= $see_more['title']; ?>
          </a>
        </div>
      <?php endif; ?>
    <?php endif; ?>
    <?php if (($count > 3) && (!$no_paging)) : ?>
      <div class="row justify-content-center pagination-nav-container">
        <div class="col-12 col-lg-10 col-xl-8 pagination-nav cta__item slide-in-animation">
          <?= pagination_bar($offer, 'pagination-nav__numbers'); ?>
        </div>
      </div>
    <?php endif; ?>
  <?php wp_reset_query();
  endif; ?>
</section>