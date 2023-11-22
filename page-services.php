<?php get_header(); ?>
<div class="textContent">
    <?php while (have_posts()): the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <p><?php the_content(); ?></p>
    <?php endwhile; ?>
    <p class="smallBlogPostText"><?php echo paginate_links(); ?></p>
</div>
<?php get_footer(); ?>