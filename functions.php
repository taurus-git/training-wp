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
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => false,
        'rest_base'           => '',
        'show_in_menu'        => true,
        'exclude_from_search' => false,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'hierarchical'        => false,
        'rewrite'             => array( 'slug'=>'dogs/%dogscat%', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
        'has_archive'         => 'dogs',
        'query_var'           => true,
        'supports'            => array( 'title', 'custom-fields'),
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
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => false,
        'rest_base'           => '',
        'show_in_menu'        => true,
        'exclude_from_search' => false,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'hierarchical'        => false,
        'rewrite'             => array( 'slug'=>'cats/%catscat%', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
        'has_archive'         => 'cats',
        'query_var'           => true,
        'supports'            => array( 'title', 'custom-fields'),
    ) );

}

?>