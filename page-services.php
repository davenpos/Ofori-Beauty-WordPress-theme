<?php get_header(); ?>
<div class="textContent">
    <?php while (have_posts()): the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <p><?php the_content(); ?></p>
    <?php endwhile;
    /*$allServices = new WP_Query(array('post_type' => 'product'));

    if ($allServices->have_posts()):
        while ($allServices->have_posts()): $allServices->the_post();
            global $product; ?>
            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
            <p><?php the_excerpt(); ?></p>
        <?php endwhile;
    else:
        echo '<p>No services yet</p>';
    endif;*/
    ?>
</div>
<?php get_footer(); ?>