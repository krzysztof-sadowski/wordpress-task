<?php
defined('ABSPATH') or die('No script kiddies please!');

get_template_part('index-base', 'top');

custom_mostpopular_list( $wp_query, false, array(
    'limit' => get_option('posts_per_page', 20),
    'header' => 'Najpopularniejsze - więcej'
));

get_template_part('index-base', 'bottom');