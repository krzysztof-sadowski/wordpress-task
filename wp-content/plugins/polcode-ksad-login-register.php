<?php
/**
 * Plugin Name: Custom Register and Login Forms
 */
defined('ABSPATH') or die('No script kiddies please!');

function login_register_buttons() {
    if(is_user_logged_in()) {
        echo 'Log out, My profile';
    } else {
        echo 'Log in, Register';
    }
}

