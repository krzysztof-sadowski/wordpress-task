<?php

define('POST_SOURCE_WEB', 'web');
define('POST_SOURCE_PAPER', 'paper');


function custom_fep_form() {
    if ( ! is_page()) return;
    
    global $post;

    ?>
    <?php do_action('custom-fep-alerts'); ?>
    <?php if(is_user_logged_in()) {
        if(
                'POST' == $_SERVER['REQUEST_METHOD']
                && !empty($_POST['cfep_action']) && $_POST['cfep_action'] == 'custom-fep-add-post'
                && !has_action('custom-fep-alerts' , 'custom_fep_errors')
        ) {
            ?>
                <script>
                    $(document).ready(function(){
                        $('#cfep-reload-link').attr('href', 'javascript:window.location.href=window.location.href');
                    });
                </script>
                <div class="text-center">
                    <a href="" id="cfep-reload-link" class="btn btn-primary" ><?php _e('Dodaj następny post') ?></a>
                </div>
            <?php
        } else {
            ?>
                <form role="form" id="cfep-form" method="post" action="<?php the_permalink(); ?>">
                    <div class="form-group">
                        <label for="cfep_title"><?php _e('Tytuł') ?></label>
                        <input type="text" name="cfep_title" class="form-control" value="<?php echo sanitize_text_field($_POST['cfep_title']) ?>">
                    </div>
                    <div class="form-group">
                        <label for="cfep_content"><?php _e('Treść') ?></label>
                        <textarea name="cfep_content" class="form-control" rows="10"><?php echo $_POST['cfep_content'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cfep_tag1"><?php _e('Tag 1') ?></label>
                                    <input type="text" name="cfep_tag1" class="form-control" value="<?php echo sanitize_text_field($_POST['cfep_tag1']) ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cfep_tag2"><?php _e('Tag 2') ?></label>
                                    <input type="text" name="cfep_tag2" class="form-control" value="<?php echo sanitize_text_field($_POST['cfep_tag2']) ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cfep_tag3"><?php _e('Tag 3') ?></label>
                                    <input type="text" name="cfep_tag3" class="form-control" value="<?php echo sanitize_text_field($_POST['cfep_tag3']) ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cfep_source"><?php _e('Źródło') ?></label>
                                    <select name="cfep_source" id="cfep_source_select" class="form-control" >
                                        <option value="<?php echo POST_SOURCE_WEB ?>"
                                                <?php if($_POST['cfep_source'] == POST_SOURCE_WEB) echo 'selected="selected"' ?>
                                                ><?php _e('link') ?></option>
                                        <option value="<?php echo POST_SOURCE_PAPER ?>"
                                                <?php if($_POST['cfep_source'] == POST_SOURCE_PAPER) echo 'selected="selected"' ?>
                                                ><?php _e('wydawnictwo papierowe') ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cfep_expiration_date"><?php _e('Wygasa') ?></label>
                                    <input type="text" name="cfep_expiration_date" class="form-control" placeholder="RRRR-MM-DD"
                                           value="<?php echo sanitize_text_field($_POST['cfep_expiration_date']) ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function(){
                            function cfep_source_select_onChange(e) {
                                var selectedSource = $('select#cfep_source_select option:selected').val();
                                if(selectedSource == "<?php echo POST_SOURCE_PAPER ?>") {
                                    $('#cfep_source_web').addClass('hidden');
                                    $('#cfep_source_paper').removeClass('hidden');
                                } else {
                                    $('#cfep_source_web').removeClass('hidden');
                                    $('#cfep_source_paper').addClass('hidden');
                                }
                            }
                            $('select#cfep_source_select').on('change', cfep_source_select_onChange);
                            cfep_source_select_onChange(null);
                        });
                    </script>

                    <div class="form-group" id="cfep_source_web">
                        <div class="form-group">
                            <label for="cfep_source_link"><?php _e('Link') ?></label>
                            <input type="url" name="cfep_source_link" class="form-control" value="<?php echo sanitize_text_field($_POST['cfep_source_link']) ?>">
                        </div>
                    </div>

                    <div class="form-group hidden" id="cfep_source_paper">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="cfep_source_title"><?php _e('Tytuł') ?></label>
                                    <input type="text" name="cfep_source_title" class="form-control" value="<?php echo sanitize_text_field($_POST['cfep_source_title']) ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cfep_source_issue_num"><?php _e('Numer wydania') ?></label>
                                    <input type="number" name="cfep_source_issue_num" class="form-control" value="<?php echo sanitize_text_field($_POST['cfep_source_issue_num']) ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary btn-spaced"><?php _e('Zapisz') ?></button>
                    </div>
                    
                    <input type="hidden" name="cfep_action" value="custom-fep-add-post" />
                </form>
            <?php
        }
    } else {
        ?>
            <div class="alert alert-info" role="alert"><?php _e('Zaloguj się, aby zamieszczać posty.') ?></div>
        <?php
    }
}


function custom_fep_errors() {
    global $error_array;
    
    foreach($error_array as $error) {
        ?>
            <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
        <?php
    }
}

function custom_fep_notices() {
    global $notice_array;
    foreach($notice_array as $notice)  {
        ?>
            <div class="alert alert-success" role="alert"><?php echo $notice ?></div>
        <?php
    }
}


function custom_fep_add_post() {
    if ('POST' == $_SERVER['REQUEST_METHOD'] && !empty($_POST['cfep_action']) && $_POST['cfep_action'] == 'custom-fep-add-post') {
        if ( ! is_user_logged_in())
            return;
        global $current_user;

        $user_id	= $current_user->ID;
        $post_title     = $_POST['cfep_title'];
        $post_content	= $_POST['cfep_content'];
        
        $tags = array();
        if(!empty($_POST['cfep_tag1'])) $tags[] = sanitize_text_field($_POST['cfep_tag1']);
        if(!empty($_POST['cfep_tag2'])) $tags[] = sanitize_text_field($_POST['cfep_tag2']);
        if(!empty($_POST['cfep_tag3'])) $tags[] = sanitize_text_field($_POST['cfep_tag3']);
        
        $post_source = $_POST['cfep_source'];
        $post_expiration_date = $_POST['cfep_expiration_date'];
        $post_source_link = $_POST['cfep_source_link'];
        $post_source_title = $_POST['cfep_source_title'];
        $post_source_issue_num = $_POST['cfep_source_issue_num'];
        
        
        //Walidacja
        
        global $error_array;
        $error_array = array();

        if(empty($post_title)) {
            $error_array[] = __('Uzupełnij tytuł.');
        } else if(strlen($post_title) > 64) {
            $error_array[] = __('Tytuł jest za długi - maksymalnie 64 znaki.');
        }
        if(empty($post_content)) {
            $error_array[] = __('Uzupełnij treść.');
        }
        if(!in_array($post_source, [POST_SOURCE_WEB, POST_SOURCE_PAPER])) {
            $error_array[] = __('Pole "Źródło" zawiera błędne dane.');
        }
        if($post_source == POST_SOURCE_WEB) {
            if(empty($post_source_link)) {
                $error_array[] = __('Podaj adres źródła.');
            } else {
                if(!custom_is_url_valid($post_source_link)) {
                    $error_array[] = __('Adres źródła jest niepoprawny. Pamiętaj o podaniu protokołu (np. "http://").');
                } else {
                    $post_source_link = esc_url($post_source_link);
                }
            }
        } else {
            if(empty($post_source_title)) {
                $error_array[] = __('Podaj tytuł źródła.');
            }
            if(empty($post_source_issue_num)) {
                $error_array[] = __('Podaj numer wydania.');
            } else if(!is_numeric($post_source_issue_num)) {
                $error_array[] = __('Numer wydania musi być liczbą.');
            }
        }
        $post_expiration_date = DateTime::createFromFormat('Y-m-d|', $post_expiration_date);
        if(empty($post_expiration_date))
            $error_array[] = __('Data wygaśnięcia jest niepoprawna.');
        else
            $post_expiration_date = $post_expiration_date->getTimestamp();
        
        
        if (count($error_array) == 0) {

            $post_id = wp_insert_post(array(
                'post_author'	=> $user_id,
                'post_title'	=> $post_title,
                'post_type'     => 'post',
                'post_content'	=> $post_content,
                'tags_input'	=> $tags,
                'post_status'	=> 'publish'
            ));
            
            add_post_meta($post_id, '_expiration-date', $post_expiration_date);
            add_post_meta($post_id, 'source', $post_source);
            if($post_source == POST_SOURCE_WEB) {
                add_post_meta($post_id, 'source-link', $post_source_link);
            } else {
                add_post_meta($post_id, 'source-title', $post_source_title);
                add_post_meta($post_id, 'source-issue-num', $post_source_issue_num);
            }

            global $notice_array;
            $notice_array = array();
            $notice_array[] = 'Post został zapisany.';
            add_action('custom-fep-alerts', 'custom_fep_notices');
        } else {
            add_action('custom-fep-alerts', 'custom_fep_errors');
        }
    }
}

add_action('init','custom_fep_add_post');