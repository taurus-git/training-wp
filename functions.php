<?php
function getPostCounter() {
    global $wpdb;
    $postCounter = $wpdb->get_var( "SELECT count(*) FROM dbwordpress.wp_posts WHERE post_status = 'publish' AND post_type = 'post'" );
    echo "Total posts: " . $postCounter;
}
?>