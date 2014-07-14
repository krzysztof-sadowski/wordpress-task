<?php
defined('ABSPATH') or die('No script kiddies please!');

get_header(); ?>

            <?php if(is_active_sidebar( 'home-top' )) { get_sidebar('home-top'); } ?>

            <div class="row">
                <div class="<?php echo is_active_sidebar('home-right') ? 'col-sm-8 ' : 'col-sm-12 '; ?>">
                    
                    <?php if(is_active_sidebar( 'home-above-recent-posts' )) { get_sidebar('home-above-recent-posts'); } ?>
                    
                    <?php  if(function_exists('wpp_get_mostpopular')) {
                        
                        $header_end = '</h2>';
                        if($wp_query->found_posts > $wp_query->post_count) {
                            $header_end = ' <small><a href="#">zobacz więcej</a></small>' . $header_end;
                        }
                        
                        wpp_get_mostpopular([
                            'header' => 'Najpopularniejsze',
                            'header_start' => '<h2>',
                            'header_end' => $header_end,
                            'limit' => get_option('posts_per_page', 10),
                            'range' => 'monthly',
                            'order_by' => 'views',
                            'stats_comments' => 0,
                            'wpp_start' => '<div class="list-group">',
                            'wpp_end' => '</div>',
                            'post_html' => '<a href="{url}" class="list-group-item">{text_title}</a>'
                        ]);
                    } ?>
                    
                    <?php if ( $wp_query->have_posts() ) : ?>
                        <h2>Najnowsze (<?php echo $wp_query->post_count . '/' . $wp_query->found_posts ?>)
                            <?php if($wp_query->found_posts > $wp_query->post_count) : ?>
                                <small><a href="#">zobacz więcej</a></small>
                            <?php endif; ?>
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
                        $expiring_query = new WP_Query([
                            'meta_key' => '_expiration-date',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                        ]);
                        if($expiring_query->have_posts()) :
                            ?>
                            <h2>Wkrótce wygasną (<?php echo $expiring_query->post_count . '/' . $expiring_query->found_posts ?>)
                                <?php if($expiring_query->found_posts > $expiring_query->post_count) : ?>
                                    <small><a href="#">zobacz więcej</a></small>
                                <?php endif; ?>
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
                </div>
                <?php if(is_active_sidebar( 'home-right' )) : ?>
                    <div class="col-sm-4">
                        <?php get_sidebar('home-right'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="row">
                <div class="col-xs-12 text-center">
                    <button type="button" class="btn btn-primary btn-lg">Dodaj post</button>
                </div>
            </div>

        </div>
    </body>
</html>
