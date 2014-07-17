<?php
defined('ABSPATH') or die('No script kiddies please!');
?>
                </div>
                <?php if(is_active_sidebar( 'home-right' )) : ?>
                    <div class="col-sm-4">
                        <?php get_sidebar('home-right'); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if(is_user_logged_in()) : ?>
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <a href="<?php echo custom_get_page_permalink('new-post') ?>"
                           type="button" class="btn btn-primary btn-lg btn-spaced">Dodaj post</a>
                    </div>
                </div>
            <?php endif; ?>
<?php get_footer(); ?>
