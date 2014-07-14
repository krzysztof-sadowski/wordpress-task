<?php
include_once(get_template_directory() . '/widgets.php');

function custom_widgets_init() {
    register_sidebar(array(
        'name' => __('Homepage top panel'),
        'description' => __('Widgets in this area show up on the top of the homepage.'),
        'id' => 'home-top',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Homepage, above recent'),
        'description' => __('Widgets in this area show up above the recent posts area on the homepage.'),
        'id' => 'home-above-recent-posts',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Homepage right sidebar'),
        'description' => __('Widgets in this area show up on the right-hand side of the homepage.'),
        'id' => 'home-right',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="text-center">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('User profile top panel'),
        'description' => __('Widgets in this area show up on the top of the user profile page.'),
        'id' => 'user-profile-top',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    
    
    
}
add_action( 'widgets_init', 'custom_widgets_init' );


function custom_pre_get_posts($query) {
    
    
    //TODO: usuń
    //$query = new WP_Query();
    
    
    if( ! $query->is_home)
        return;
    //sortuj po świeżości
}
add_action('pre_get_posts', 'custom_pre_get_posts');
