<?php get_header() ?>

<main  class="clearfix">
    <div class="posts-flow clearfix">
        <?php the_post(); ?>
        <?php echo "------------------------------------------|"; ?>
        <?php echo get_post_format(); ?>
        <?php echo "|------------------------------------------"; ?>
        <article class="postItem-full">
            <?php get_template_part('single-templates/content', get_post_format()); ?>
        </article>
    </div>
</main>

<?php get_sidebar(); ?>

<?php get_footer() ?>
