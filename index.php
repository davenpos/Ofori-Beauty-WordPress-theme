<?php get_header(); ?>
<div class="blogColumns">
    <div class="textContent blogPage">
        <?php if (have_posts()):
            while (have_posts()): the_post();
                $categories = get_the_category();
                $categoryList = '';

                if ($categories):
                    foreach ($categories as $cat):
                        $categoryList .= '<a href="' . get_category_link($cat->term_id) .'">' . $cat->cat_name . '</a>, ';
                    endforeach;
                endif; ?>
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <p class="smallBlogPostText">Posted by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author(); ?></a><?php echo ($categories) ? ' under ' . trim($categoryList, ', ') : ''; ?> on <?php the_time('F j, Y'); ?></p>
                <p><?php the_excerpt(); ?></p>
            <?php endwhile; ?>
            <p class="smallBlogPostText"><?php echo paginate_links(); ?></p>
        <?php else: ?>
            <p>No posts yet.</p>
        <?php endif; ?>
    </div>
    <?php get_template_part('widgetsidebar'); ?>
</div>
<?php get_footer(); ?>