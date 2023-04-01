<?php

function export_variables_to_js()
{
  wp_localize_script('maints', 'ajax', array(
    'ajaxurl' => site_url() . '/panel-cms/admin-ajax.php',
  ));
  wp_enqueue_script('maints');
}
add_action('wp_enqueue_scripts', 'export_variables_to_js');


?>