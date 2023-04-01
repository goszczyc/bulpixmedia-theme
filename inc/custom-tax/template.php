<?php 

/****************** CUSTOM TAXONOMY ******************/

function wpdocs_create_offers_taxonomies() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
      'name'              => _x( 'Kategoria Oferty', 'taxonomy general name', 'textdomain' ),
      'singular_name'     => _x( 'Kategoria Oferty', 'taxonomy singular name', 'textdomain' ),
      'search_items'      => __( 'Szukaj Kategoriii Oferty', 'textdomain' ),
      'all_items'         => __( 'Wszystkie Kategorie Oferty', 'textdomain' ),
      'parent_item'       => __( 'Rodzic Kategorii Oferty', 'textdomain' ),
      'parent_item_colon' => __( 'Rodzice Kategorii Oferty', 'textdomain' ),
      'edit_item'         => __( 'Edytuj Kategorię Oferty', 'textdomain' ),
      'update_item'       => __( 'Zaaktualizuj Kategorię Oferty', 'textdomain' ),
      'add_new_item'      => __( 'Dodaj nową Kategorię Oferty', 'textdomain' ),
      'new_item_name'     => __( 'Dodaj nową nazwę Kategorię Oferty ', 'textdomain' ),
      'menu_name'         => __( 'Kategoria Oferty', 'textdomain' ),
  );

  $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => get_post_field('post_name', 13 ), 'with_front' => false ),
  );

  register_taxonomy( 'offers', 'offer' , $args );
}

add_action( 'init', 'wpdocs_create_offers_taxonomies', 0);
