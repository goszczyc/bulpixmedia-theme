<?php
$sub_field = (isset($args['sub_field'])) ? $args['sub_field'] : '';
$description = get_sub_field($sub_field);
?>

<div class="offer-description cta__item slide-in-animation container">
  <?= $description; ?>
</div>