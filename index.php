<?php get_header(); ?>
<div>
    <?php get_template_part('widgetsidebar'); ?>
    <div class="textContent blogPage <?php if (is_archive()) echo 'archivePage' ?>"><?php if (is_archive()): ?>
            <h1 class="archiveHeader">
            <?php if (is_author()): ?>
                All posts by <?php the_author(); ?>:
            <?php elseif (is_category()): ?>
                All posts under <?php single_cat_title(); ?> category:
            <?php elseif (is_day()): ?>
                All posts from <?php echo DateTime::createFromFormat('!m', get_query_var('monthnum'))->format('F') . ' ' . get_query_var('day') . ', ' . get_query_var('year'); ?>:
            <?php elseif (is_month()): ?>
                All posts from <?php single_month_title(' '); ?>:
            <?php elseif (is_year()): ?>
                All posts from <?php echo get_query_var('year'); ?>:
            <?php endif; ?>
            </h1><hr>
        <?php endif;

        if (have_posts()):
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
            <p>No posts found.</p>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>