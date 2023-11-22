<?php get_header(); ?>
<div class="blogColumns">
    <div class="textContent blogPage">
        <?php while (have_posts()): the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <p><?php the_content(); ?></p>
        <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>