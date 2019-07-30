<?php

/**
 * Custom Post Type Functions
 * @CPT : intranet & store 
 * 
 **/

// Our custom post type function
function create_posttype() {

$labels = array(
        'name'                => _x( 'Intranets', 'Post Type General Name', 'kvdc' ),
        'singular_name'       => _x( 'Intranet', 'Post Type Singular Name', 'kvdc' ),
        'menu_name'           => __( 'Intranets', 'kvdc' ),
        'parent_item_colon'   => __( 'Parent Intranet', 'kvdc' ),
        'all_items'           => __( 'All Intranets', 'kvdc' ),
        'view_item'           => __( 'View Intranet', 'kvdc' ),
        'add_new_item'        => __( 'Add New Intranet', 'kvdc' ),
        'add_new'             => __( 'Add New', 'kvdc' ),
        'edit_item'           => __( 'Edit Intranet', 'kvdc' ),
        'update_item'         => __( 'Update Intranet', 'kvdc' ),
        'search_items'        => __( 'Search Intranet', 'kvdc' ),
        'not_found'           => __( 'Not Found', 'kvdc' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'kvdc' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Intranets', 'kvdc' ),
        'description'         => __( 'Intranet news and reviews', 'kvdc' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //~ 'taxonomies'          => array( 'level' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'menu_icon'           => 'dashicons-vault',
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'intranet', $args );
    
    $labels = array(
        'name'                => _x( 'Stores', 'Post Type General Name', 'kvdc' ),
        'singular_name'       => _x( 'Store', 'Post Type Singular Name', 'kvdc' ),
        'menu_name'           => __( 'Stores', 'kvdc' ),
        'parent_item_colon'   => __( 'Parent Store', 'kvdc' ),
        'all_items'           => __( 'All Stores', 'kvdc' ),
        'view_item'           => __( 'View Store', 'kvdc' ),
        'add_new_item'        => __( 'Add New Store', 'kvdc' ),
        'add_new'             => __( 'Add New', 'kvdc' ),
        'edit_item'           => __( 'Edit Store', 'kvdc' ),
        'update_item'         => __( 'Update Store', 'kvdc' ),
        'search_items'        => __( 'Search Store', 'kvdc' ),
        'not_found'           => __( 'Not Found', 'kvdc' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'kvdc' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Stores', 'kvdc' ),
        'description'         => __( 'Store news and reviews', 'kvdc' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'menu_icon'           => 'dashicons-store',
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'store', $args );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
