<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php the_title(); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <?php wp_head(); ?>
</head>
<body>
<div  class="wrapper">
    <header>
        <div class="header-top clearfix">
            <a href="<?php echo home_url(); ?>" class="logo"><?php bloginfo('name'); ?></a>
            <nav class="top-menu">
                <div class="menu-button">MENU</div>
                <?php wp_nav_menu([
                    'theme_location' => 'top',
                    'container' => null,
                    'items_wrap' => '<ul>%3$s</ul>'
                ]); ?>
            </nav>
        </div>
        <?php get_sidebar('header'); ?>
    </header>
    <div  class="content-wrapper clearfix">
