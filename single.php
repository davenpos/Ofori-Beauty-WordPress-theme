<?php get_header(); ?>
<div class="blogColumns">
    <div class="widgetSidebar">
        <?php dynamic_sidebar('Blog Sidebar'); ?>
    </div>
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
            <p class="smallBlogPostText">Posted by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author(); ?></a><?php echo ($categories) ? ' under ' . trim($categoryList, ', ') : ''; ?> on <?php the_time('F j, Y'); ?></p>
            <div class="postContent"><?php the_content(); ?></div>
        <?php if (comments_open() or get_comments_number()):
            comments_template();
        endif;
    endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>