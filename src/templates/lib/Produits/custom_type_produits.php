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
    'menu_icon'           => 'dashicons-carrot',
    'show_in_nav_menus'   => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => false,
    'has_archive'         => false,
    'query_var'           => true,
    'can_export'          => true,
    'rewrite'             => array( 'slug' => $post_type )
    );

    register_post_type($post_type, $args );

    $taxonomy="genre";
    $object_type = array("produit");
    $args = array(
    'label' => __( 'Genre' ),
    'rewrite' => array( 'slug' => 'genre' ),
    'hierarchical' => true,
    );
    register_taxonomy( $taxonomy, $object_type, $args );

    $taxonomy="pays";
    $object_type = array("produit");
    $args = array(
    'label' => __( 'Pays' ),
    'rewrite' => array( 'slug' => 'pays' ),
    'hierarchical' => false,
    );
    register_taxonomy( $taxonomy, $object_type, $args );
}
add_action( 'init', 'ajout_custom_type_init' );
