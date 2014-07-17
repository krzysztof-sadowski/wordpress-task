<?php
defined('ABSPATH') or die('No script kiddies please!');

get_header(); ?>
            <div class="row">
                <div class="col-md-8 col-md-push-2 text-center">
                    <h2>404 - NOT FOUND</h2>
                    <p>Nie odnaleziono strony o tym adresie.</p>
                    <a href="<?php echo esc_url(home_url('/')) ?>" class="btn btn-primary btn-lg btn-spaced">
                        Wróć na stronę główną
                    </a>
                </div>
            </div>
<?php get_footer(); ?>
