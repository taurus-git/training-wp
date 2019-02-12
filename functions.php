<?php
function get_post_counter()
{
    global $wpdb;
    $post_counter = intval($wpdb->get_var("SELECT count(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post'"));
    return $post_counter;
}
//Custom post types
add_action( 'init', 'register_animals_post_type' );
function register_animals_post_type() {
    // register taxonomy for note type - "dogs"
    register_taxonomy('dogscat', array('dogs_breed'), array(
        'label'                 => 'Category of breeds',
        'labels'                => array(
            'name'              => 'Category of breeds',
            'singular_name'     => 'Category of breed',
            'search_items'      => 'Find category of breeds',
            'all_items'         => 'All categories of breeds',
            'parent_item'       => 'Parent category of breed',
            'parent_item_colon' => 'Parent category of breed:',
            'edit_item'         => 'Edit category of breed',
            'update_item'       => 'Update Category of breed',
            'add_new_item'      => 'Add Category of breed',
            'new_item_name'     => 'New category of breed',
            'menu_name'         => 'Add category',
        ),
        'description'           => 'Rubric for category of breeds',
        'public'                => true,
        'show_in_nav_menus'     => false,
        'show_ui'               => true,
        'show_tagcloud'         => false,
        'hierarchical'          => true,
        'rewrite'               => array('slug'=>'dogs', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
        'show_admin_column'     => true,
    ) );

    // note type - "dogs"
    register_post_type('dogs', array(
        'label'               => 'Notes',
        'labels'              => array(
            'name'          => 'Notes',
            'singular_name' => 'Note',
            'menu_name'     => 'Dogs Profile',
            'all_items'     => 'All notes',
            'add_new'       => 'Add note',
            'add_new_item'  => 'Add new note',
            'edit'          => 'Edit',
            'edit_item'     => 'Edit note',
            'new_item'      => 'New note',
        ),
        'description'         => '',
        'menu_icon'           => 'dashicons-smiley',
        'public'              => true,
        'show_in_rest'        => false,
        'rest_base'           => '',
        'show_in_menu'        => true,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'hierarchical'        => false,
        'rewrite'             => array( 'slug'=>'dogs/%dogscat%', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
        'has_archive'         => true,
        'query_var'           => true,
        'supports'            => array( 'title', 'custom-fields'),
        'taxonomies'          => array( 'dogscat' ),
    ) );
    // note type - cats
    register_post_type('cats', array(
        'label'               => 'Notes',
        'labels'              => array(
            'name'          => 'Notes',
            'singular_name' => 'Note',
            'menu_name'     => 'Cats Profile',
            'all_items'     => 'All notes',
            'add_new'       => 'Add note',
            'add_new_item'  => 'Add new note',
            'edit'          => 'Edit',
            'edit_item'     => 'Edit note',
            'new_item'      => 'New note',
        ),
        'description'         => '',
        'menu_icon'           => 'dashicons-palmtree',
        'public'              => true,
        'show_in_rest'        => false,
        'rest_base'           => '',
        'show_in_menu'        => true,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'hierarchical'        => false,
        'rewrite'             => array( 'slug'=>'cats/%catscat%', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
        'has_archive'         => true,
        'query_var'           => true,
        'supports'            => array( 'title', 'custom-fields'),
    ) );
}
add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme-slug' ),
        'id' => 'right-sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<div class="right-sidebar">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}

?>