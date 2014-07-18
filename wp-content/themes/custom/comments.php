<?php
defined('ABSPATH') or die('No script kiddies please!');

if (post_password_required()) {
    return;
}
?>

<div class="comments-area">

    <?php if (have_comments()) : ?>

        <h2 class="comments-title">
            <?php
                printf(
                    _n('1 komentarz:', '%1$s komentarzy', get_comments_number()),
                    number_format_i18n(get_comments_number())
                );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
                wp_list_comments(array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size'=> 0,
                ));
            ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="custom-pagination" role="navigation">
                <div class="nav-previous">
                    <?php previous_comments_link(__('&larr; Starsze komentarze')) ?>
                </div>
                <div class="nav-next">
                    <?php next_comments_link(__('Nowsze komentarze &rarr;')) ?>
                </div>
            </nav>
        <?php endif; ?>

        <?php if (!comments_open()) : ?>
            <p class="no-comments"><?php _e('Komentarze są wyłączone.') ?></p>
        <?php endif; ?>

    <?php endif; ?>
    
    <?php
        $user_profile_permalink = custom_get_page_permalink('profile');
    
        comment_form(array(
            'title_reply'       => __('Napisz komentarz'),
            'title_reply_to'    => __('Odpowiedz na komentarz autorstwa %s'),
            'cancel_reply_link' => __('Anuluj'),
            'label_submit'      => __('Skomentuj'),
            'must_log_in'       =>  '<p class="must-log-in">' .
                                    sprintf(
                                        __('Musisz być <a href="%s">zalogowany</a>, aby pisać komentarze.'),
                                        wp_login_url(apply_filters('the_permalink', get_permalink()))
                                    ) . '</p>',

            'logged_in_as'      =>  '<p class="logged-in-as">' .
                                    sprintf(
                                        __('Zalogowany jako <a href="%1$s">%2$s</a>. <a href="%3$s">Wylogować?</a>'),
                                        $user_profile_permalink,
                                        $user_identity,
                                        wp_logout_url(apply_filters('the_permalink', get_permalink()))
                                    ) . '</p>',

            'comment_notes_before'  =>  '<p class="comment-notes">'
                                        . __('Twój adres email nie zostanie opublikowany.')
                                        . ( $req ? $required_text : '' )
                                        . '</p>',

            'comment_notes_after'   =>  '<p class="form-allowed-tags">' .
                                            sprintf(
                                                __('Możesz używać następujących tagów i atrybutów <abbr title="HyperText Markup Language">HTML</abbr>: %s'),
                                                ' <code>' . allowed_tags() . '</code>'
                                            ) . '</p>',

            'comment_field'         =>  '<p class="comment-form-comment"><label for="comment">' . _x('Komentarz', 'noun') .
                                        '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
                                        '</textarea></p>',
            
            'fields' => apply_filters('comment_form_default_fields', array(

                'author' =>
                    '<p class="comment-form-author">' .
                    '<label for="author">' . __('Imię') . '</label> ' .
                    ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30"' . $aria_req . ' /></p>',

                'email' =>
                    '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . '</label> ' .
                    ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30"' . $aria_req . ' /></p>',

                'url' =>
                    '<p class="comment-form-url"><label for="url">' .
                    __( 'Strona internetowa' ) . '</label>' .
                    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                    '" size="30" /></p>'
                )
            ),
        ));
    ?>

</div>
