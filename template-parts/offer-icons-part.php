<div class="offers-icons container container--full-hd">
  <?php if ($we_offer_heading = get_field('we_offer_heading')) : ?>
    <div class="offers-icons__headings cta__item slide-in-animation">
      <?= $we_offer_heading; ?>
    </div>
  <?php endif; ?>
  <div class="offers-icons__cards row justify-content-center cta__item slide-in-animation">

    <?php
    $offer_categories = get_terms($args = array(
      'taxonomy' => 'offers',
      'order' => 'DSC'
    ));
    ?>
    <?php foreach ($offer_categories as $offer) :
      $id = $offer->term_id;
      $link = esc_url(get_category_link($id));
      $name = $offer->name;
      $description = $offer->description;
      $icon = get_field('offer_icon', 'offers_' . $id);
      $title_color = get_field('offer_title_color', 'offers_' . $id);
      ($title_color) ? $title_color : $title_color = '#fff';
    ?>
      <div class="offers-icons__card">
        <?= wp_get_attachment_image($icon); ?>
        <h3 class="offers-icons__card-title" style="color:<?= $title_color; ?>;"><?= $name; ?></h3>
        <p class="offers-icons__card-description"><?= $description; ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</div>