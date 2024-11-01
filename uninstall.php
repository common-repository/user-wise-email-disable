<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

if( get_option('uwed_checked_users') == NULL || !empty(get_option('uwed_checked_users')) ){
	delete_option('uwed_checked_users');
}