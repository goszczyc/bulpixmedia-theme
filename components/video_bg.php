<?php
$sub_field = (isset($args['sub_field'])) ? $args['sub_field'] : '';
$video_url = get_sub_field($sub_field);
?>

<div class="showcase-realization__video-bg cta__item slide-in-animation">
  <video src="<?= $video_url; ?>" autoplay muted loop>
    <source src="<?= $video_url; ?>">
  </video>
</div>