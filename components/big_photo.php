<?php
$sub_field = (isset($args['sub_field'])) ? $args['sub_field'] : '';
$photo = get_sub_field($sub_field);
?>
<div class="container">
  <div class="showcase-realization__photo cta__item slide-in-animation">
    <?= wp_get_attachment_image($photo, 'full'); ?>
  </div>
</div>