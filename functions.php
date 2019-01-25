<?php
function get_post_counter()
{
    global $wpdb;
    $post_counter = intval($wpdb->get_var("SELECT count(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post'"));

    return $post_counter;
}

?>