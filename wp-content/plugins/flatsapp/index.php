<?php

/**
 * Plugin Name: Заявки на квартиры
 */

add_action('wp_ajax_flatapp', 'flatsapp_ajax');
add_action('wp_ajax_nopriv_flatapp', 'flatsapp');
add_action('wp_head', 'js_vars');
add_action('init', 'flatsapp_data');
add_action('admin_menu', 'flatsapp_menu');

function js_vars() {
    $vars = [
        'ajax_url' => admin_url('admin-ajax.php'),
    ];
    echo "<script>window.wp = " . json_encode($vars) . "</script>";
}

function flatsapp_ajax() {
    $flat_id = (int)$_POST['flat_id'];
    $phone = htmlspecialchars($_POST['phone']);

    $data = [
        'post_type' => 'flatsapp',
        'post_status' => 'publish',
        'post_title' => $phone,
    ];

    $post_id = wp_insert_post($data);

    add_post_meta($post_id, 'flat_id', $flat_id);

    $res = [
        'success' => true
    ];

    echo json_encode($res);
    wp_die();
}

function flatsapp_data() {
    register_post_type('flatsapp', [
        'labels' => [
            'name' => 'Заявки на квартиры', // Основное название типа записи
            'menu_name' => 'Заявки на квартиры'

        ],
        'public' => true,
        'menu_position' => 25,
        'menu_icon' => 'dashicons-category',
        'hierarchical' => false,
        'supports' => array('title', 'custom-fields'),
        'has_archive' => true,
    ]);
}

function flatsapp_menu() {
    add_menu_page('Заявки', 'Заявки', 8, 'flatsapp', 'flatsapp_list');
}

function flatsapp_list() {
    $result = "";
    $config = array(
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'flatsapp',
    );
    $posts = get_posts($config);
    global $post;

    $result .= "<table>";

    foreach ($posts as $post) {
        $meta = get_post_custom($post->ID);

        setup_postdata($post);

        $title = get_the_title();
        $date = get_the_date();

        $result .= <<<EOT
            <tr>
                <td><em>$date</em></td>
                <td><strong>$title</strong></td>
                <td><strong>{$meta['flat_id'][0]}</strong></td>
            </tr>
EOT;
    }

    $result .= "</table>";

    wp_reset_postdata();

    echo $result;
}
