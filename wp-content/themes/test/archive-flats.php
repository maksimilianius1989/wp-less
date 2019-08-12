<?php get_header() ?>

<main  class="clearfix">

    <div class="posts-flow clearfix">
        <?php if (have_posts()): ?>
            <?php while(have_posts()): the_post(); ?>
                <article class="postItem">
                    <a href= "<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('flats-thumb'); ?>
                    </a>
                    <h2><?php the_title(); ?></h2>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            Записей нет!
        <?php endif; ?>
    </div>
</main>
<aside>
    123
</aside>
<?php get_footer() ?>
