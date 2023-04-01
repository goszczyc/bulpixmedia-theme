<?php

/*************** IMAGE SIZES ***************/
if ( function_exists( 'add_image_size' ) ) {
  add_image_size('gallery-image', 400, 400, true);
  add_image_size('gallery-image-full', 1920, 9999, true);
  add_image_size('post-thumb', 450, 560, true);
}

?>