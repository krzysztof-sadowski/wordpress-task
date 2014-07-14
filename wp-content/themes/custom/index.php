<?php
defined('ABSPATH') or die('No script kiddies please!');

get_header(); ?>

            <?php if(is_active_sidebar( 'home-top' )) { get_sidebar('home-top'); } ?>

            <div class="row">
                <div class="<?php echo is_active_sidebar('home-right') ? 'col-sm-8 ' : 'col-sm-12 '; ?>">
                    <h2>Najpopularniejsze <small><a href="#">zobacz więcej</a></small></h2>
                    <div class="list-group">
                        <a href="#" class="list-group-item">Post</a>
                        <a href="#" class="list-group-item">Post</a>
                        <a href="#" class="list-group-item">Post</a>
                        <a href="#" class="list-group-item">Post</a>
                        <a href="#" class="list-group-item">Post</a>
                    </div>
                    <h2>Najnowsze <small><a href="#">zobacz więcej</a></small></h2>
                    <div class="list-group">
                        <a href="#" class="list-group-item">Post</a>
                        <a href="#" class="list-group-item">Post</a>
                        <a href="#" class="list-group-item">Post</a>
                        <a href="#" class="list-group-item">Post</a>
                        <a href="#" class="list-group-item">Post</a>
                    </div>
                    <h2>Wkrótce wygasną <small><a href="#">zobacz więcej</a></small></h2>
                    <div class="list-group">
                        <a href="#" class="list-group-item">Post</a>
                        <a href="#" class="list-group-item">Post</a>
                        <a href="#" class="list-group-item">Post</a>
                        <a href="#" class="list-group-item">Post</a>
                        <a href="#" class="list-group-item">Post</a>
                    </div>
                    <p>Todo: oddzielić powyższe do osobnego szablonu?</p>
                    <p>Todo: wyświetlanie "zobacz więcej" uzależnić od liczby wszystkich postów.</p>
                    <p>Todo: wyświetlanie sekcji uzależnić od istnienia postów danego typu.</p>
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
