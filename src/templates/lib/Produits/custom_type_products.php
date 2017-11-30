<?php

function ajout_custom_type_init() {
    $post_type = "produit";
    $labels = array(
    'name'               => 'Produits',
    'singular_name'      => 'Produit',
    'all_items'          => 'Tous les produits',
    'add_new'            => 'Ajouter un produit',
    'add_new_item'       => 'Ajouter un nouveau produit',
    'edit_item'          => "Editer le produit",
    'new_item'           => 'Nouveau produit',
    'view_item'          => "Voir le produit",
    'search_items'       => 'Chercher un produit',
    'not_found'          => 'Pas de résultat',
    'not_found_in_trash' => 'Pas de résultat',
    'parent_item_colon'  => 'Produit parent :',
    'menu_name'          => 'Produits',
    );

    $args = array(
    'labels'              => $labels,
    'hierarchical'        => false,
    'supports'            => array( 'title','thumbnail','editor', 'revisions'),
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 0,
    'menu_icon'           => 'dashicons-products',
    'show_in_nav_menus'   => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => false,
    'has_archive'         => true,
    'query_var'           => true,
    'can_export'          => true,
    'rewrite'             => array( 'slug' => $post_type )
    );

    register_post_type($post_type, $args );

    $taxonomy="category";
    $object_type = array("produit");
    $args = array(
    'label' => __( 'Catégorie' ),
    'rewrite' => array( 'slug' => 'category' ),
    'hierarchical' => false,
    );
    register_taxonomy( $taxonomy, $object_type, $args );

    $taxonomy="gamme";
    $object_type = array("produit");
    $args = array(
    'label' => __( 'Gamme' ),
    'rewrite' => array( 'slug' => 'gamme' ),
    'hierarchical' => false,
    );
    register_taxonomy( $taxonomy, $object_type, $args );
}
add_action( 'init', 'ajout_custom_type_init' );

function wpcodex_add_excerpt_support_for_cpt() {
 add_post_type_support( 'produit', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_cpt' );
