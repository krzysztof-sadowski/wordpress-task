<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
        <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    banner
                </div>
                <div class="col-md-2">
                    <div class="hidden-md hidden-lg">
                        <div class="row">
                            <div class="col-xs-6">
                                login/logout
                            </div>
                            <div class="col-xs-6">
                                register/viewprofile
                            </div>
                        </div>
                    </div>
                    <div class="hidden-xs hidden-sm">
                        <div class="row">
                            <div class="col-xs-12">
                                login/logout
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                register/viewprofile
                            </div>
                        </div>
                    </div>
                </div>
            </div>