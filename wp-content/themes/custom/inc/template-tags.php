<?php
include_once(get_template_directory() . '/inc/template-tags-front-end-posting.php');

/**
 * @param WP_Query $wp_query
 * @param Boolean $showMoreLink
 * @param Array $options
 */
function custom_mostpopular_list($wp_query, $showMoreLink = true, $options = []) {
    if( ! function_exists('wpp_get_mostpopular')) {
        return;
    }
    
    $header_end = '</h2>';
    if($showMoreLink == true) {
        $permalink = custom_get_page_permalink('popular-more');
        if($permalink != false && $wp_query->found_posts > $wp_query->post_count) {
            $header_end = ' <small><a href="' . $permalink . '">zobacz więcej</a></small>' . $header_end;
        }
    }
    
    $defaultOptions = [
        'header' => 'Najpopularniejsze',
        'header_start' => '<h2>',
        'header_end' => $header_end,
        'post_type' => 'post',
        'limit' => $wp_query->query_vars['posts_per_page'],
        'range' => 'monthly',
        'order_by' => 'views',
        'stats_comments' => 0,
        'wpp_start' => '<div class="list-group">',
        'wpp_end' => '</div>',
        'post_html' => '<a href="{url}" class="list-group-item">{text_title}</a>'
    ];
    
    $options = array_merge($defaultOptions, $options);

    wpp_get_mostpopular($options);
}


function custom_pagination($wp_query) {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    $markerNumber = 999999999;
    echo paginate_links([
        'base'         => str_replace($markerNumber, '%#%', esc_url(get_pagenum_link($markerNumber))),
	'format'       => '%#%',
	'total'        => $wp_query->max_num_pages,
	'current'      => $paged,
	'prev_text'    => '«',
	'next_text'    => '»',
	'type'         => 'plain',
    ]);
}

function custom_get_page_permalink($slug) {
    $page = get_page_by_path($slug);
    if(isset($page)) {
        return get_permalink($page);
    }
}