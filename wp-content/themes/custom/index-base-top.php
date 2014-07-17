<?php
defined('ABSPATH') or die('No script kiddies please!');

get_header(); ?>

            <?php if(is_active_sidebar( 'home-top' )) { get_sidebar('home-top'); } ?>

            <div class="row">
                <div class="<?php echo is_active_sidebar('home-right') ? 'col-sm-8 ' : 'col-sm-12 '; ?>">
                    
                    