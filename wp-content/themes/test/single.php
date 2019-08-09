<?php get_header() ?>

<main  class="clearfix">
    <div class="posts-flow clearfix">
        <?php the_post(); ?>
        <article class="postItem-full">
            <div><?php the_date(); ?></div>
            <div><?php the_tags(); ?></div>
            <div><?php wp_list_categories(); ?></div>
            <?php the_post_thumbnail('large'); ?>
            <h2><?php the_title(); ?></h2>
            <div><?php the_content() ?></div>
        </article>
    </div>
</main>

<?php get_sidebar(); ?>

<?php get_footer() ?>
