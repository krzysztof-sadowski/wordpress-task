<?php
defined('ABSPATH') or die('No script kiddies please!');

get_template_part('index-base', 'top');

$recent_query = new WP_Query([
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
]);
if($recent_query->have_posts()) :
    ?>
    <h2>Najnowsze - więcej</h2>
    <div class="list-group">
    <?php while ($recent_query->have_posts()) : $recent_query->the_post(); ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="list-group-item"><?php the_title(); ?></a>
    <?php endwhile; ?>
    </div>
    <?php
endif;
?>
    <div class="custom-pagination">
        <?php custom_pagination($recent_query) ?>
    </div>
<?php

get_template_part('index-base', 'bottom');
