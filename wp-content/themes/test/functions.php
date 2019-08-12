<?php

include_once(__DIR__ . '/inc/test-recent-posts.php');

add_action('wp_enqueue_scripts', 'test_media');
add_action('after_setup_theme', 'test_after_setup');
add_action('widgets_init', 'test_widgets');
add_action('init', 'test_post_types');

add_filter('widget_text', "do_shortcode");

//add_filter('pre_get_document_title', 'test_get_title');
add_filter('the_content', 'test_get_content');
add_filter('the_content', 'test_get_content2');

add_shortcode('test_recent', 'test_shortcode_test');

add_filter('the_title', function ($t) {
    if (is_single()) {
        $t = CFS()->get('doc_title');
    }

    return $t;
});

function test_media()
{
    wp_enqueue_style('test-main', get_stylesheet_uri());
    wp_enqueue_script('test-script-jquery', get_template_directory_uri() . '/assets/js/jquery-3.2.0.min.js');
    wp_enqueue_script('test-script-main', get_template_directory_uri() . '/assets/js/script.js', ['test-script-jquery']);
}

function test_after_setup()
{
    register_nav_menu('top', 'Верхнее');
    register_nav_menu('footer', 'Для дашборда');

    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    add_theme_support('post-formats', ['quote', 'aside']);
}

function test_widgets()
{
    register_sidebar([
        'name' => 'Sidebar Right',
        'id' => 'sidebar-right',
        'description' => 'Правая колонка',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => "</div>\n",
    ]);

    register_sidebar([
        'name' => "Sidebar Top",
        'id' => 'sidebar-top',
        'description' => 'Верхний сайдбар',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => "</div>\n",
    ]);

    register_widget('Test_Recent_Posts');
}

function test_get_content($content)
{
    return "===> " . $content;
}

function test_get_content2($content)
{
    return "<===  " . $content;
}

function test_shortcode_test()
{
    $result = "";
    $config = array(
        'numberposts' => 5,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'post',
    );
    $posts = get_posts($config);
    global $post;

    foreach ($posts as $post) {
        setup_postdata($post);

        $link = get_the_permalink();
        $title = get_the_title();
        $date = get_the_date();
        $intro = CFS()->get('info');

        $result .= <<<EOT
            <div>
                <div><em>$date</em></div>
                <div><strong>$title</strong></div>
                <div>$intro</div>
                <a href="$link">More...</a>
            </div>
EOT;
    }

    wp_reset_postdata();
    return $result;
}

function test_post_types()
{
    register_post_type('reviews', [
        'labels' => [
            'name' => 'Отзывы', // Основное название типа записи
            'singular_name' => 'Отзыв', // отдельное название записи типа Book
            'add_new' => 'Добавить новый',
            'add_new_item' => 'Добавление отзыва',
            'edit_item' => 'Редактирование отзыва',
            'new_item' => 'Новый отзыв',
            'view_item' => 'Смотреть отзыв',
            'search_items' => 'Искать отзыв',
            'not_found' => 'Не найдено',
            'not_found_in_trash' => 'В корзине не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Отзывы'

        ],
        'description' => '',
        'public' => true,
        'menu_position' => 25,
        'menu_icon' => 'dashicons-format-quote',
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'thumbnail'),
    ]);
    
    function test_show_reviews() {
        $args = [
            'orderby' => 'date',
            'order' => 'DESC',
            'post_type' => 'reviews',
        ];

        $posts = get_posts($args);

        return $posts;
    }
}
