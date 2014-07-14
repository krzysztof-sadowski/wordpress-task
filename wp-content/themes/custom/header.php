<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="container">
            <div class="row" id="site-header-row">
                <div class="col-md-10" id="site-header">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/header.jpg" class="img-responsive">
                    </a>
                </div>
                <div class="col-md-2 hidden-xs hidden-sm">
                    <?php if(is_user_logged_in()) : ?>
                        <button type="button" class="btn btn-primary btn-lg btn-block">Wyloguj</button>
                        <button type="button" class="btn btn-default btn-lg btn-block">Mój profil</button>
                    <?php else : ?>
                        <button type="button" class="btn btn-primary btn-lg btn-block">Zaloguj</button>
                        <button type="button" class="btn btn-default btn-lg btn-block">Rejestracja</button>
                    <?php endif; ?>
                </div>
                <div class="col-md-2 hidden-md hidden-lg">
                    <div class="btn-group btn-group-justified">
                        <?php if(is_user_logged_in()) : ?>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-lg btn-block">Wyloguj</button>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-lg btn-block">Mój profil</button>
                            </div>
                        <?php else : ?>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-lg btn-block">Zaloguj</button>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-lg btn-block">Rejestracja</button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            

            