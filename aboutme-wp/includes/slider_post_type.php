<?php
    function register_slides_posttype() {
        $labels = array(
            'name'              => __( 'slides', 'aboutme-wp' ),
            'singular_name'     => __( 'slide', 'aboutme-wp' ),
            'add_new'           => __( 'Add New Slide', 'aboutme-wp' ),
            'add_new_item'      => __( 'Add New Slide', 'aboutme-wp' ),
            'edit_item'         => __( 'Edit Slide', 'aboutme-wp' ),
            'new_item'          => __( 'New Slide', 'aboutme-wp' ),
            'view_item'         => __( 'View Slide', 'aboutme-wp' ),
            'search_items'      => __( 'Search Slides', 'aboutme-wp' ),
            'not_found'         => __( 'No slide found', 'aboutme-wp' ),
            'not_found_in_trash'=> __( 'No slide found in Trash', 'aboutme-wp' ),
            'parent_item_colon' => __( 'Parent slides:', 'aboutme-wp' ),
            'menu_name'         => __( 'Slides', 'aboutme-wp' )
        );
 
        $taxonomies = array();
 
        $supports = array('title','thumbnail');
 
        $post_type_args = array(
            'labels'            => $labels,
            'singular_label'    => __('slide', 'aboutme-wp'),
            'public'            => true,
            'show_ui'           => true,
            'publicly_queryable'=> true,
            'query_var'         => true,
            'capability_type'   => 'post',
            'has_archive'       => false,
            'hierarchical'      => false,
            'rewrite'           => array( 'slug' => 'slides', 'with_front' => false ),
            'supports'          => $supports,
            'menu_position'     => 99,
            'menu_icon'         => get_template_directory_uri() . '/images/slide-icon.png',
            'taxonomies'        => $taxonomies
        );
        register_post_type('slides',$post_type_args);
    }
add_action('init', 'register_slides_posttype');
add_action('do_meta_boxes', 'aboutme_image_box2');

function aboutme_image_box2() {

	remove_meta_box( 'postimagediv', 'slides', 'side' );

	add_meta_box('postimagediv', __('Slide Image', 'cafemio'), 'post_thumbnail_meta_box', 'slides', 'normal', 'high');

}
?>