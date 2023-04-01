<?php $page_id = (isset($args['page_id'])) ? $args['page_id'] : ''; ?>
<div class="offers container container--full-hd">
  <?php if ($offers_heading = get_field('offers_heading', $page_id)) : ?>
    <div class="offers__headings cta__item slide-in-animation">
      <?= $offers_heading; ?>
    </div>
  <?php endif; ?>
    <div class="offers__cards">
      <div class="row">
        <?php
        $offer_categories = get_terms($args = array(
          'taxonomy' => 'offers',
          'order' => 'ASC'
        ));
        ?>
        <?php foreach ($offer_categories as $offer) :
          $id = $offer->term_id;
          $link = esc_url(get_category_link($id));
          $name = $offer->name;
          $description = $offer->description;
          $image = get_field('offer_card_image', 'offers_' . $id);
        ?>
          <a href="<?= $link; ?>" class="col-12 col-xs-10 offset-xs-1 col-sm-6 offset-sm-0 col-xl-4 cta__item slide-in-animation">
            <div class="offers__card" style="background-image: url('<?= esc_url($image); ?>');">
              <h3 class="offers__card-title"><?= $name; ?></h3>
              <p class="offers__card-description"><?= $description; ?></p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
  </div>
  <div class="offers__background-tape cta__item slide-in-animation"><?php get_template_part('/components/tape-with-arrow'); ?></div>
</div>