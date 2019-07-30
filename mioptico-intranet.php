<?php
/**
 * Plugin Name: MIOPTICO INTRANET
 * Description: Main System Mioptico Intranet
 * Version:     0.01
 * Author:      KVDC
 * Author URI:  https://kvconsultants.com/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wporg
 * Domain Path: /languages
 */


if (!defined('ABSPATH'))
    {
    exit;
    }

//DEFINE 
define("PLUGIN_DIR", plugin_dir_path( __FILE__ ));
define("PLUGIN_URL", plugin_dir_url( __FILE__ ));

//Include Functions
include(PLUGIN_DIR . 'functions/cpt.php'); //Custom Post Type
include(PLUGIN_DIR . 'functions/helper-functions.php'); //Helper Functions
include(PLUGIN_DIR . 'functions/metabox.php'); //Custom Metabox
include(PLUGIN_DIR . 'users/level.php'); //User Categories
include(PLUGIN_DIR . 'users/user-menu.php'); //User Admin Menu
include(PLUGIN_DIR . 'template/functions.php'); //Function Template

	
	
