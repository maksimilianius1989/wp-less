<?php

include_once(__DIR__ . '/inc/test-recent-posts.php');

add_action('wp_enqueue_scripts', 'test_media');
add_action('after_setup_theme', 'test_after_setup');
add_action('widgets_init', 'test_widgets');
add_action('init', 'test_post_types');
add_action('wp_head', 'test_js_vars');

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

    add_image_size('flats-thumb', 400, 300, true);
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

    register_post_type('flats', [
        'labels' => [
            'name' => 'Квартиры', // Основное название типа записи
            'singular_name' => 'Квартира', // отдельное название записи типа Book
            'add_new' => 'Добавить новый квартиры',
            'add_new_item' => 'Добавление квартиры',
            'edit_item' => 'Редактирование квартиры',
            'new_item' => 'Нововая квартира',
            'view_item' => 'Смотреть квартиры',
            'search_items' => 'Искать квартиры',
            'not_found' => 'Не найдено квартир',
            'not_found_in_trash' => 'В корзине не найдено квартир',
            'parent_item_colon' => '',
            'menu_name' => 'Квартиры'

        ],
        'public' => true,
        'menu_position' => 25,
        'menu_icon' => 'dashicons-category',
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
    ]);

    register_taxonomy('city', ['flats'], [
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Города',
            'singular_name'     => 'Город',
            'search_items'      => 'Найти город',
            'all_items'         => 'Все города',
            'view_item '        => 'Посмотреть город',
            'edit_item'         => 'Редактировать город',
            'update_item'       => 'Обновить город',
            'add_new_item'      => 'Добавить новый город',
            'new_item_name'     => 'Добавить новый',
            'menu_name'         => 'Города',
        ),
        'description'           => '', // описание таксономии
        'public'                => true,
        'hierarchical'          => false,
    ]);

    register_taxonomy('rooms', ['flats'], [
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Комнаты',
            'singular_name'     => 'Комната',
            'search_items'      => 'Найти комнату',
            'all_items'         => 'Все комнаты',
            'view_item '        => 'Посмотреть комнату',
            'edit_item'         => 'Редактировать комнату',
            'update_item'       => 'Обновить комнату',
            'add_new_item'      => 'Добавить новую комнату',
            'new_item_name'     => 'Добавить комнату',
            'menu_name'         => 'Комнаты',
        ),
        'description'           => '', // описание таксономии
        'public'                => true,
        'hierarchical'          => false,
    ]);
}

function test_show_reviews() {
    $args = [
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'reviews',
    ];
    $posts = get_posts($args);
    return $posts;
}

function test_js_vars() {
    $vars = [
        'ajax_url' => admin_url('admin-ajax.php'),
    ];
    echo "<script>window.wp = " . json_encode($vars) . "</script>";
}

add_action('wp_ajax_flatapp', 'test_ajax_flatapp');
add_action('wp_ajax_nopriv_flatapp', 'test_ajax_flatapp');

function test_ajax_flatapp() {
    $res = [
        'success' => mt_rand(0, 1) ? true : false,
        'err' => '123',
    ];

    echo json_encode($res);
    wp_die();
}