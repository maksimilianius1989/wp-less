<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <title>Главная</title>
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
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
        <?php if (is_active_sidebar('sidebar-top')): ?>
            <div  class="header-bottom">
                <span>
                    <?php dynamic_sidebar('sidebar-top'); ?>
                </span>
            </div>
        <?php endif; ?>
    </header>
    <div  class="content-wrapper clearfix">
