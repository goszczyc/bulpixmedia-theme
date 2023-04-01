<?php
function get_full_portfolio()
{
  ob_start();

  $args = array(
    'post_type' => 'offer',
    'nopaging' => true,
    'order' => 'ASC',
    'tax_query' => array(
      array(
        'taxonomy' => 'offers',
        'field' => 'slug',
        'terms' => 'film'
      )
    )
  );
  $ajaxPosts = new WP_Query($args);
?>
  <?php
  if ($ajaxPosts->have_posts()) : ?>
    <div class="portfolio-full row">
      <?php while ($ajaxPosts->have_posts()) :
        $ajaxPosts->the_post();
      ?>
        <div class="col-12 col-xs-6 col-sm-4 col-md-3">
          <div class="portfolio__small-card">
            <?php $realization_video = get_field('video_thumbnail'); ?>
            <?php
            if (!$realization_video) : ?>
              <div class="portfolio__small-card-img-container">
                <?= get_the_post_thumbnail('', '', ['class' => 'portfolio__small-card-img']); ?>
                <img src="<?= esc_url(get_template_directory_uri()); ?>/images/zoom-icon.svg" alt="" class="portfolio__small-card-zoom">
              </div>;
            <?php else :
              echo $realization_video;
            endif; ?>
          </div>
        </div>
      <?php
      endwhile;
      wp_reset_query(); ?>

    </div>
  <?php endif;

  $html = ob_get_clean();

  $response = array('html' => $html);

  echo json_encode($response);

  die();
}
add_action('wp_ajax_get_full_portfolio', 'get_full_portfolio');
add_action('wp_ajax_nopriv_get_full_portfolio', 'get_full_portfolio');

function get_default_portfolio()
{
  ob_start();
  // Query argmuments
  $get_page_num = intval(substr($_POST['base'], -1));
  $paged = $get_page_num;

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

  $defaultPortfolio = new WP_Query($args);

  if ($defaultPortfolio->have_posts()) : ?>
    <div class="row">
      <?php
      $desc_position = 'text-left';
      while ($defaultPortfolio->have_posts()) : $defaultPortfolio->the_post();
      ?>

        <div class="portfolio__card portfolio__card--<?= $desc_position; ?> col-12 grid-container">
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
          </div>
        </div>

      <?php
        ($desc_position == 'text-left') ? $desc_position = 'text-right' : $desc_position = 'text-left';
      endwhile; ?>
    </div>
<?php wp_reset_query();
  endif;

  $html = ob_get_clean();

  $response = array('html' => $html);

  echo json_encode($response);


  die();
}
add_action('wp_ajax_get_default_portfolio', 'get_default_portfolio');
add_action('wp_ajax_nopriv_get_default_portfolio', 'get_default_portfolio');
