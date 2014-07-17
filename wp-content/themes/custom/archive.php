<?php
defined('ABSPATH') or die('No script kiddies please!');

get_template_part('index-base', 'top');
?>
    <?php if ($wp_query->have_posts()) : ?>
        <h2>
            Najnowsze posty
            <?php
                if(is_category()) {
                    echo 'w kategorii "' . single_cat_title('',false) . '"';
                } else if(is_tag()) {
                    echo 'z tagiem "' . single_cat_title('',false) . '"';
                } else if(is_author()) {
                    echo 'autora "' . get_userdata($author)->display_name . '"';
                }
            ?>
        </h2>
        <div class="list-group">
            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="list-group-item"><?php the_title(); ?></a>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

    <div class="custom-pagination">
        <?php custom_pagination($wp_query) ?>
    </div>

<?php
get_template_part('index-base', 'bottom');
