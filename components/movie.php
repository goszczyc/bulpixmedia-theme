<?php
$sub_field = (isset($args['sub_field'])) ? $args['sub_field'] : '';
$video = get_sub_field($sub_field);
?>

<div class="cta__item slide-in-animation container">

  <div class="showcase-realization__video-container">
    <div class="showcase-realization__video">
      <?= $video; ?>
    </div>
  </div>

</div>