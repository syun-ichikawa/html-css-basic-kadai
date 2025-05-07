<?php

// 登録済みのjQueryを解除して、登録し直す
function remove_default_jquery()
{
    // 管理画面でないなら
    if (!is_admin()) {
        wp_deregister_script('jquery');

        wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), 3.2, true);
        wp_enqueue_script('popper_js', get_template_directory_uri() . '/styles/bootstrap4/popper.js', array(), 4.0, true);
        wp_enqueue_script('bootstrap4_js', get_template_directory_uri() . '/styles/bootstrap4/bootstrap.min.js', array(), 4.0, true);
    }
}


add_action('wp_enqueue_scripts', 'remove_default_jquery');
add_theme_support('post-thumbnails');

function create_graduate_voice_post_type() {
    // Labels for the post type
    $labels = array(
        'name' => __('卒業生の声'),
        'singular_name' => __('卒業生の声'),
        'add_new' => __('新規追加'),
        'add_new_item' => __('新しい卒業生の声を追加'),
        'edit_item' => __('卒業生の声を編集'),
        'new_item' => __('新しい卒業生の声'),
        'view_item' => __('卒業生の声を見る'),
        'search_items' => __('卒業生の声を探す'),
        'not_found' => __('卒業生の声は見つかりませんでした'),
        'not_found_in_trash' => __('ゴミ箱に卒業生の声は見つかりませんでした')
    );

    // Arguments for the post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'show_in_rest' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-welcome-learn-more',
    );

    // Register the post type
    register_post_type('graduate_voice', $args);
}
add_action('init', 'create_graduate_voice_post_type');