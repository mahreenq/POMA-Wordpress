<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Format comments */
require_once( 'library/class-foundationpress-comments.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/class-foundationpress-top-bar-walker.php' );
require_once( 'library/class-foundationpress-mobile-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/class-foundationpress-protocol-relative-theme-assets.php' );



function wmpudev_enqueue_icon_stylesheet() {
    wp_register_style( 'fontawesome', 'http:////maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
		wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:100, 300,400,700|Oswald:300,500,600', false );
    wp_enqueue_style( 'fontawesome');
}
add_action( 'wp_enqueue_scripts', 'wmpudev_enqueue_icon_stylesheet' );




function my_product_taxonomy($cpt) {
  $labels = array(
    'name'              => _x( $cpt, 'taxonomy general name' ),
    'singular_name'     => _x( $cpt, 'taxonomy singular name' ),
    'search_items'      => __( 'Search '.$cpt ),
    'all_items'         => __( 'All '.$cpt ),
    'parent_item'       => __( 'Parent '.$cpt ),
    'parent_item_colon' => __( 'Parent '.$cpt.':' ),
    'edit_item'         => __( 'Edit '.$cpt ),
    'update_item'       => __( 'Update '.$cpt ),
    'add_new_item'      => __( 'Add '.$cpt.'Test' ),
    'new_item_name'     => __( 'New '.$cpt ),
    'menu_name'         => __( $cpt ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  //register_taxonomy( 'product_category', 'products', $args );
  return $args;
}



function register (){
  $a = array( 'events' =>'Event Type' ,
              'artists' => 'Artists Type',
              'testimonials' => 'Testimonial Type',
            );
						foreach  ( $a as $key => $value )  {
					    $args= get_post_args($key);
					    $taxarg = my_product_taxonomy($value);
					    register_post_type($key, $args, 0);
					    register_taxonomy( $value , $key , $taxarg);
					  }
}
add_action( 'init', 'register', 0 );



 /**
  * Create custom Taxonomy(ies)
  */
  function get_post_args($cpt){
    $labels = array(
              'name'                  => _x( $cpt, 'Post Type General Name', 'text_domain' ),
              'singular_name'         => _x( $cpt, 'Post Type Singular Name', 'text_domain' ),
              'menu_name'             => __( $cpt, 'text_domain' ),
              'name_admin_bar'        => __( $cpt, 'text_domain' ),
              'archives'              => __( 'Item Archives', 'text_domain' ),
              'attributes'            => __( 'Item Attributes', 'text_domain' ),
              'parent_item_colon'     => __( "Parent $cpt :", 'text_domain' ),
              'all_items'             => __( 'All ' .$cpt, 'text_domain' ),
              'add_new_item'          => __( "Add New $cpt", 'text_domain' ),
              'add_new'               => __( "New $cpt ", 'text_domain' ),
              'new_item'              => __( 'New Item', 'text_domain' ),
              'edit_item'             => __( "Edit $cpt", 'text_domain' ),
              'update_item'           => __( "Update $cpt", 'text_domain' ),
              'view_item'             => __( "View $cpt", 'text_domain' ),
              'view_items'            => __( 'View Items', 'text_domain' ),
              'search_items'          => __( 'Search'.$cpt.'s', 'text_domain' ),
              'not_found'             => __( "No $cpt found", 'text_domain' ),
              'not_found_in_trash'    => __( "No $cpt found in Trash", 'text_domain' ),
              'featured_image'        => __( 'Featured Image', 'text_domain' ),
              'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
              'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
              'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
              'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
              'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
              'items_list'            => __( 'Items list', 'text_domain' ),
              'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
              'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
          );
          $args = array(
              'label'                 => __( $cpt, 'text_domain' ),
              'description'           => __( 'Post Type Description', 'text_domain' ),
              'labels'                => $labels,
              'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats',),
        //  		'taxonomies'            => array( 'category', 'post_tag' ),
              'hierarchical'          => false,
              'public'                => true,
              'show_ui'               => true,
              'show_in_menu'          => true,
              'menu_position'         => 5,
              'show_in_admin_bar'     => true,
              'show_in_nav_menus'     => true,
              'can_export'            => true,
              'has_archive'           => true,
              'exclude_from_search'   => false,
              'publicly_queryable'    => true,
              'capability_type'       => 'page',
            );
            return $args;
    }