<?php
defined('ABSPATH') or die('No script kiddies please!');

get_header(); ?>

    <?php while ( have_posts() ) : the_post() ?>
        <div class="row">
            <article id="post-<?php the_ID() ?>" <?php post_class('col-md-8 col-md-push-2') ?>>

                <header>
                    <?php the_title('<h1 class="post-title">', '</h1>') ?>
                    <?php
                        $comments_displayed = (!post_password_required() && (comments_open() || get_comments_number()));
                        $column_class = $comments_displayed ? 'col-md-3' : 'col-md-4';
                    ?>
                    <div class="row text-center post-meta">
                        <div class="<?php echo $column_class ?>">
                            <?php _e('Autor: ') ?>
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>" rel="author">
                                <?php the_author() ?>
                            </a>
                        </div>
                        <div class="<?php echo $column_class ?>">
                            <?php _e('Napisany: ') ?>
                            <time class="post-date"
                                  datetime="<?php echo esc_attr(get_the_date('c')) ?>">
                                      <?php the_date('Y-m-d') ?>
                            </time>
                        </div>
                        <div class="<?php echo $column_class ?>">
                            <?php
                            _e('Wygasa: ');
                            $post_expiration_date = (new DateTime())->setTimestamp(get_post_meta(get_the_ID(), '_expiration-date', true));
                            ?>
                            <time class="post-expiration-date"
                                  datetime="<?php echo $post_expiration_date->format('c') ?>">
                                      <?php echo $post_expiration_date->format('Y-m-d') ?>
                            </time>
                        </div>
                        <div class="<?php echo $column_class ?>">
                            <?php
                                if ($comments_displayed) {
                                    comments_popup_link(__('Napisz komentarz'), __('1 komentarz'), __('% komentarzy'));
                                }
                            ?>
                        </div>
                    </div>
                    <div class="post-content">
                        <?php the_content() ?>
                    </div>
                    <div class="custom-pagination custom-post-pagination">
                        <?php
                            wp_link_pages(array(
                                'before'           => '<div class="page-links"><span class="page-links-title">' . __( 'Strony:') . '</span>',
                                'after'            => '</div>',
                                'link_before'      => '<span>',
                                'link_after'       => '</span>',
                                //'next_or_number'   => 'number',
                                //'separator'        => ' ',
                                'nextpagelink'     => '«', 
                                'previouspagelink' => '»',
                                //'pagelink'         => '%',
                                //'echo'             => 1
                            ));
                        ?>
                    </div>
                    <footer class="post-meta">
                        <div class="post-tags">
                            <?php the_tags(__('Tagi: ', ', ')) ?>
                        </div>
                        <div>
                            Źródło: 
                            <?php
                                $source = get_post_meta(get_the_ID(), 'source', true);
                                if($source == POST_SOURCE_WEB) {
                                    $source_link = get_post_meta(get_the_ID(), 'source-link', true);
                                    ?>
                                        <a href="<?php echo $source_link ?>"><?php echo $source_link ?></a>
                                    <?php
                                } else {
                                    $source_title = get_post_meta(get_the_ID(), 'source-title', true);
                                    $source_issue_num = get_post_meta(get_the_ID(), 'source-issue-num', true);
                                    if(!empty($source_issue_num)) {
                                        $source_issue_num = ', wydanie ' . $source_issue_num . '.';
                                    }
                                    ?>
                                        <i><?php echo $source_title ?></i><?php echo $source_issue_num ?>
                                    <?php
                                }
                            ?>
                        </div>
                    </footer>
                </header>
            </article>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-push-2">
                <?php
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                ?>
            </div>
        </div>
        <?php endwhile; ?>
    
<?php get_footer(); ?>