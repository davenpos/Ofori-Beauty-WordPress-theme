<?php get_header(); ?>
<div class="textContent">
    <?php if (have_posts()):
        while (have_posts()): the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <p><?php the_content(); ?></p>
        <?php endwhile;
    else: ?>
        <p>No posts yet.</p>
    <?php endif; ?>
</div>
<?php get_footer(); ?>