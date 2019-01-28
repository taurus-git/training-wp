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
    // Раздел "собак" - dogscat
    register_taxonomy('dogs_profile', array('dogs'), array(
        'label'                 => 'Category of notes', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Category of notes',
            'singular_name'     => 'Category of note',
            'search_items'      => 'Find category of notes',
            'all_items'         => 'All categories of notes',
            'parent_item'       => 'Parent category of note',
            'parent_item_colon' => 'Parent category of note:',
            'edit_item'         => 'Edit category of note',
            'update_item'       => 'Update Category of note',
            'add_new_item'      => 'Add Category of note',
            'new_item_name'     => 'New category of note',
            'menu_name'         => 'Add category',
        ),
        'description'           => 'Rubric for category of notes', // описание таксономии
        'public'                => true,
        'show_in_nav_menus'     => false, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_tagcloud'         => false, // равен аргументу show_ui
        'hierarchical'          => true,
        'rewrite'               => array('slug'=>'dogs', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
        'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    ) );

    // тип записи - собаки - dogs
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
        'supports'            => array( 'title', 'editor' ),
        'taxonomies'          => array( 'dogscat' ),
    ) );
// Раздел "кошек" - catscat
    register_taxonomy('cats_profile', array('cats'), array(
        'label'                 => 'Category of notes', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Category of notes',
            'singular_name'     => 'Category of note',
            'search_items'      => 'Find category of notes',
            'all_items'         => 'All categories of notes',
            'parent_item'       => 'Parent category of note',
            'parent_item_colon' => 'Parent category of note:',
            'edit_item'         => 'Edit category of note',
            'update_item'       => 'Update Category of note',
            'add_new_item'      => 'Add Category of note',
            'new_item_name'     => 'New category of note',
            'menu_name'         => 'Add category',
        ),
        'description'           => 'Rubric for category of notes', // описание таксономии
        'public'                => true,
        'show_in_nav_menus'     => false, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_tagcloud'         => false, // равен аргументу show_ui
        'hierarchical'          => true,
        'rewrite'               => array('slug'=>'cats', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
        'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    ) );

    // тип записи - кошки - cats
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
        'supports'            => array( 'title', 'editor' ),
        'taxonomies'          => array( 'catscat' ),
    ) );

}

?>