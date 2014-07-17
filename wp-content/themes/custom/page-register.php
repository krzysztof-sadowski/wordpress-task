<?php
defined('ABSPATH') or die('No script kiddies please!');

get_header(); ?>
            <div class="row">
                <div class="col-md-8 col-md-push-2">
                    <?php echo do_shortcode('[pie_register_form]'); ?>
                </div>
            </div>
<?php get_footer(); ?>