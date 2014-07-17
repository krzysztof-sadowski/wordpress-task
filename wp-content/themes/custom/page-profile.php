<?php
defined('ABSPATH') or die('No script kiddies please!');

get_header(); ?>
            <?php if(is_active_sidebar('user-profile-top')) { get_sidebar('user-profile-top'); } ?>
            <div class="row">
                <div class="col-md-8 col-md-push-2">
                    <?php echo do_shortcode('[pie_register_profile]'); ?>
                </div>
            </div>
<?php get_footer(); ?>