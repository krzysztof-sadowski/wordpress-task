<?php
defined('ABSPATH') or die('No script kiddies please!');

get_header(); ?>
            <div class="row">
                <div class="col-md-8 col-md-push-2">
                    <h2 class="text-center">Dodaj post</h2>
                    <p class="text-center">Wszystkie pola są obowiązkowe.</p>
                    <?php custom_fep_form() ?>
                </div>
            </div>
<?php get_footer(); ?>