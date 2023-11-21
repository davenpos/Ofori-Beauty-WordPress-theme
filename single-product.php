<?php get_header(); ?>
<div class="blogColumns">
    <div class="textContent blogPage">
        <?php while (have_posts()): the_post();
            $categories = get_the_category();
            $categoryList = '';

            if ($categories):
                foreach ($categories as $cat):
                    $categoryList .= '<a href="' . get_category_link($cat->term_id) .'">' . $cat->cat_name . '</a>, ';
                endforeach;
            endif; ?>
            <h1><?php the_title(); ?></h1>
            <p><?php the_content(); ?></p>
        <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>