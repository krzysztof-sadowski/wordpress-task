<?php
defined('ABSPATH') or die('No script kiddies please!');

get_template_part('index-base', 'top');

define('POSTS_PER_LIST', 5);

$wp_query->query(array_merge(
    $wp_query->query_vars,
    array('posts_per_page' => POSTS_PER_LIST)
));
?>

    <?php custom_mostpopular_list($wp_query) ?>

    <?php if ($wp_query->have_posts()) : ?>
        <h2>Najnowsze
            <?php
                $recent_more_permalink = custom_get_page_permalink('recent-more');
                if($recent_more_permalink != false && $wp_query->found_posts > $wp_query->post_count) {
                    ?>
                        <small><a href="<?php echo $recent_more_permalink ?>">zobacz więcej</a></small>
                    <?php
                }
            ?>
        </h2>
        <div class="list-group">
            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="list-group-item"><?php the_title(); ?></a>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

    <?php
    //include plugin.php to gain the ability to check if a plugin is installed
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
    if(is_plugin_active('post-expirator/post-expirator.php')) :
        $expiring_query = new WP_Query(array(
            'meta_key' => '_expiration-date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'posts_per_page' => POSTS_PER_LIST,
        ));
        if($expiring_query->have_posts()) :
            ?>
            <h2>Wkrótce wygasną
                <?php
                    $expiring_more_permalink = custom_get_page_permalink('expiring-more');
                    if($expiring_more_permalink != false && $expiring_query->found_posts > $expiring_query->post_count) {
                        ?>
                            <small><a href="<?php echo $expiring_more_permalink ?>">zobacz więcej</a></small>
                        <?php
                    }
                ?>
            </h2>
            <div class="list-group">
            <?php while ($expiring_query->have_posts()) : $expiring_query->the_post(); ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="list-group-item"><?php the_title(); ?></a>
            <?php endwhile; ?>
            </div>
            <?php
        endif;
    endif;
    ?>

<?php
get_template_part('index-base', 'bottom');
