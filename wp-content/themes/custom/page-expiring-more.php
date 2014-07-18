<?php
defined('ABSPATH') or die('No script kiddies please!');

get_template_part('index-base', 'top');


//include plugin.php to gain the ability to check if a plugin is installed
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if(is_plugin_active('post-expirator/post-expirator.php')) :
    $expiring_query = new WP_Query(array(
        'meta_key' => '_expiration-date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
    ));
    if($expiring_query->have_posts()) :
        ?>
        <h2>Wkrótce wygasną - więcej</h2>
        <div class="list-group">
        <?php while ($expiring_query->have_posts()) : $expiring_query->the_post(); ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="list-group-item"><?php the_title(); ?></a>
        <?php endwhile; ?>
        </div>
        <?php
    endif;
endif;
?>
    <div class="custom-pagination">
        <?php custom_pagination($expiring_query) ?>
    </div>
<?php

get_template_part('index-base', 'bottom');
