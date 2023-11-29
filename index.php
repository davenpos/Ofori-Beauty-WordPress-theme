<?php get_header(); ?>
<div class="blogColumns">
    <div class="widgetSidebar">
        <?php dynamic_sidebar('Blog Sidebar'); ?>
    </div>
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
                get_template_part('templates/postdisplay', 'post') ?>
            <?php endwhile; ?>
            <nav id="pagination"><?php echo paginate_links(array(
                'prev_text' => '&larr;',
                'next_text' => '&rarr;',
                'type' => 'list'
            )); ?></nav>
        <?php else: ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>