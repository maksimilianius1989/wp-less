<?php get_header() ?>

<main  class="clearfix">
    <div class="posts-flow clearfix">
        <?php the_post(); ?>
        <article class="postItem-full">
            <?php $cities = get_the_terms($post->ID, 'city'); ?>
            <div>
                <?php if ($cities): ?>
                    <strong>Город:</strong>
                    <?php foreach ($cities as $city): ?>
                        <a href="<?php echo get_term_link($city->term_id); ?>"><?php echo $city->name; ?></a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <?php the_post_thumbnail('large'); ?>
            <h2><?php the_title(); ?></h2>
            <div><?php the_content(); ?></div>
        </article>
    </div>
</main>
<aside>
    <h2>Оставить заявку</h2>
    <form>
        <input type="hidden" name="id_flat" value="<?php echo $post->ID; ?>">
        <div>
            <div>Телефон</div>
            <div>
                <input type="text" name="phone">
            </div>
        </div>
        <input type="button" class="flat-app-btn" value="Отправить">
    </form>
</aside>
<?php get_footer() ?>
