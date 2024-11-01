<?php
/**
* Plugin Name: User Wise Email Disable
* Plugin URI: 
* Description: This plugin is useful for disabling user-wise mail. You need to drag and drop the user and save it then this will work automatically.
* Author: Efflux Perceive
* Author URI: 
* Version: 1.0
* License: GPL2
* License URI:  https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: user-wise-mail-disable
* Domain Path: /languages
* Requires at least: 6.0
* Requires PHP: 7.2
**/

if ( ! defined( 'UWED_VERSION' ) ) :
    define( 'UWED_VERSION', '0.1.0' );
endif;

if ( ! defined( 'UWED_PATH' ) ) :
    define( 'UWED_PATH', plugin_dir_path( __FILE__ ) );
endif;

if ( ! defined( 'UWED_URL' ) ) :
    define( 'UWED_URL', plugin_dir_url( __FILE__ ) );
endif;

if ( ! defined( 'UWED_ADMIN_URL' ) ) :
    define( 'UWED_ADMIN_URL', trailingslashit( plugin_dir_path( __FILE__ ) . 'includes/' ) );
endif;

if ( ! defined( 'UWED_BASE_NAME' ) ) :
    define( 'UWED_BASE_NAME', plugin_basename( __FILE__ ) );
endif;

if ( ! defined( 'UWED_POST_TYPE' ) ) :
    define( 'UWED_POST_TYPE', 'UWED_shortcode' );
endif;

if ( ! defined( 'UWED_TEXTDOMAIN' ) ) :
    define( 'UWED_TEXTDOMAIN', 'user-wise-mail-disable' );
endif;

add_action('init', 'uwed_load_textdomain', 10, 0);

function uwed_load_textdomain(){
    load_plugin_textdomain( 'user-wise-mail-disable', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

require_once UWED_ADMIN_URL . 'functions.php';

require_once UWED_ADMIN_URL. 'uwed.class-init.php';

?>