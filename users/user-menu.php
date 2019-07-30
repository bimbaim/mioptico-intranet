<?php

include(PLUGIN_DIR . 'users/user-management-page.php'); //User Admin Menu
/**
 * Create admin Page to list unsubscribed emails.
 */
 // Hook for adding admin menus
 add_action('admin_menu', 'users_management_add_pages');
 
 // action function for above hook
 
/**
 * Adds a new top-level page to the administration menu.
 */
function users_management_add_pages() {
     add_menu_page(
        __( 'Users Management', 'textdomain' ),
        __( 'Users Management','textdomain' ),
        'manage_options',
        'users-management',
        'users_management_page_callback',
        ''
    );
}
 

