<?php
/**
 * Template Name: Контент на фоне карт
 * Template post type: post, page
 */
?>

<?php get_header() ?>

<main  class="clearfix">a
    <div class="posts-flow clearfix">
        <?php the_post(); ?>
        <article class="postItem-full">
            <h2><?php the_title(); ?></h2>
            <div><?php the_content() ?></div>
        </article>
    </div>
</main>

<?php get_footer() ?>
