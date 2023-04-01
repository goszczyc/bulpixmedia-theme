<?php
get_header();
$term = get_queried_object();
$offer_id = $term->term_id;
$offer_slug = $term->slug;
$name = $term->name;
$image = get_field('offer_card_image', 'offers_' . $id);
$full_description = get_field('offer_full_description', 'offers_' . $offer_id);
$offer_icon = get_field('offer_icon', 'offers_' . $offer_id);
$banner_video_url = get_field('banner_video_url', 'offers_' . $offer_id);
$banner_background_url = get_field('banner_background', 'offers_' . $offer_id);
$get_banner_video = '';
if ($banner_video_url) $get_banner_video = '-video';
?>

<main class="main">
  <?php get_template_part('/template-parts/banner' . $get_banner_video, '', ['title' => $name, 'banner_bg' => $banner_background_url]); ?>

  <section class="offer-description container">
    <div class="offer-icon">
      <?= wp_get_attachment_image($offer_icon, 'full'); ?>
    </div>
    <h2><?= $name; ?></h2>
    <?= $full_description; ?>
  </section>

  <?php if (have_rows('offer_showcase', 'offers_' . $offer_id)) :
    $component_name = '';
    $field = ''; ?>

    <div class="showcase-realization">

      <?php while (have_rows('offer_showcase', 'offers_' . $offer_id)) {
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

  <?php
  if (($offer_id == 13)) {
    get_template_part('/template-parts/portfolio', '', ['offer_cat' => $offer_slug, 'no_paging' => true, 'page_id' => 'offers_' . $offer_id]);
  }
  ?>

  <section class="portfolio container container--full-hd">

    <?php if (!is_tax()) : ?>
      <input id="base" type="hidden" name="base" value="<?= $base; ?>">
    <?php endif; ?>

    <?php if ($portfolio_heading = get_field('portfolio_heading', $page_id)) : ?>

      <div class="portfolio__heading cta__item slide-in-animation">
        <?= $portfolio_heading; ?>

        <?php if ((!is_tax()) && ((is_page(495)) || (is_page(15)))) : ?>
          <div class="portfolio__switch-container">
            <input type="checkbox" name="portfolio-switch" id="portfolio-switch" class="portfolio__switch">
            <label class="portfolio__switch-label" for="portfolio-switch" data-hide="<?php _e('Hide miniatures', 'bulpix') ?>" data-show="<?php _e('Show miniatures', 'bulpix') ?>"><?php _e('Show miniatures', 'bulpix') ?></label>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if (have_rows('portfolio_videos', 'offers_' . $offer_id)) : ?>
      <div class="portfolio__cards">
        <div class="row">
          <?php
          $desc_position = 'text-left';
          while (have_rows('portfolio_videos', 'offers_' . $offer_id)) :
            the_row();
            $portfolio_id = get_sub_field('portfolio_id');
          ?>
            <div class="portfolio__card portfolio__card--<?= $desc_position; ?> col-12 grid-container ">
              <div class="portfolio__card-description">
                <h3 class="portfolio__card-title">
                  <?= get_the_title($portfolio_id); ?>
                </h3>
                <p class="portfolio__card-excerpt">
                  <?= get_the_excerpt($portfolio_id); ?>
                </p>
                <a href="<?= esc_url(get_permalink($portfolio_id)); ?>" class="portfolio__card-read-more">
                  <?php _e('See more', 'bulpix'); ?>
                </a>
              </div>
              <div class="portfolio__card-thumbnail">
                <?php $realization_video = get_field('video_thumbnail', $portfolio_id); ?>
                <?php
                if (!$realization_video) {
                  echo get_the_post_thumbnail($portfolio_id);
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
    <?php endif; ?>
  </section>

  <div class="container">
    <?php if ($see_more = get_field('see_more', 'offers_' . $offer_id)) : ?>
      <div class="row justify-content-center">
        <a href="<?= $see_more['url'] ?>" class="btn btn--inverse">
          <?= $see_more['title']; ?>
        </a>
      </div>
    <?php endif; ?>
  </div>

  <?php if (($photo_bar = get_field('photo_bar', 'offers_' . $offer_id)) || ($video_bar = get_field('video_bar', 'offers_' . $offer_id))) : ?>

    <div class="showcase-bar">
      <div class="showcase-bar__overlay"></div>
      <div class="showcase-bar__container" <?php if ($photo_bar) : ?>style="background-image: url('<?= esc_url($photo_bar); ?>');" <?php endif; ?>>
        <?php if ($video_bar) : ?>
          <video autoplay muted loop>
            <source src="<?= esc_url($video_bar); ?>" type="video/mp4">
          </video>
        <?php endif; ?>
      </div>
    </div>

  <?php endif; ?>

  <?php get_template_part('/template-parts/offer-part', '', ['page_id' => 'offers_' . $offer_id]); ?>
</main>

<?php get_footer(); ?>