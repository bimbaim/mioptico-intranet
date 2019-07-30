<?php
/* Filter the single_template with our custom function*/
add_filter('single_template', 'intranet_template');

function intranet_template($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'intranet' ) {
        if ( file_exists( PLUGIN_DIR . 'template/single-intranet.php' ) ) {
            return PLUGIN_DIR . 'template/single-intranet.php';
        }
    }
    if ( $post->post_type == 'store' ) {
        if ( file_exists( PLUGIN_DIR . 'template/single-intranet.php' ) ) {
            return PLUGIN_DIR . 'template/single-store.php';
        }
    }

    return $single;

}
