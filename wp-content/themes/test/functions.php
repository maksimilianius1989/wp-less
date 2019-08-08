<?php

add_action('wp_enqueue_scripts', 'test_media');
add_action('after_setup_theme', 'test_after_setup');
add_action('widgets_init', 'test_widgets');

function test_media() {
    wp_enqueue_style('test-main', get_stylesheet_uri());
    wp_enqueue_script('test-script-main', get_template_directory_uri() . '/assets/js/script.js');
}

function test_after_setup() {
    register_nav_menu('top', 'Верхнее');
    register_nav_menu('footer', 'Для дашборда');

    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}

function test_widgets() {
    register_sidebar([
        'name' => 'Sidebar Right',
        'id' => 'sidebar-right',
        'description' => 'Правая колонка',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => "</div>\n",
    ]);

    register_sidebar([
        'name' => "Sidebar Top",
        'id' => 'sidebar-top',
        'description' => 'Верхний сайдбар',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => "</div>\n",
    ]);
}