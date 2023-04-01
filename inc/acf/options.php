<?php
if( function_exists('acf_add_options_page') ) {
  $parent = acf_add_options_page(array(
    'page_title'  => 'Pola powtarzalne',
    'menu_title'  => 'Pola powtarzalne',
    'menu_slug'   => 'repeat',
    'capability'  => 'edit_posts',
    'redirect'    => true
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Banner',
    'menu_title'  => 'Banner',
    'parent_slug'   => $parent['menu_slug'],
  ));
  acf_add_options_sub_page(array(
    'page_title'  => 'Menu',
    'menu_title'  => 'Menu',
    'parent_slug'   => $parent['menu_slug'],
  ));
  acf_add_options_sub_page(array(
    'page_title'  => 'Dane Kontaktowe',
    'menu_title'  => 'Dane Kontaktowe',
    'parent_slug'   => $parent['menu_slug'],
  ));
  acf_add_options_sub_page(array(
    'page_title'  => 'Pracowaliśmy Dla',
    'menu_title'  => 'Pracowaliśmy Dla',
    'parent_slug'   => $parent['menu_slug'],
  ));
  acf_add_options_sub_page(array(
    'page_title'  => 'Formularz kontaktowy',
    'menu_title'  => 'Formularz kontaktowy',
    'parent_slug'   => $parent['menu_slug'],
  ));
  acf_add_options_sub_page(array(
    'page_title'  => 'Stopka',
    'menu_title'  => 'Stopka',
    'parent_slug'   => $parent['menu_slug'],
  ));

}
?>
