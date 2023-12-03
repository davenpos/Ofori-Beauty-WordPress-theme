<?php get_header(); ?>
<div class="textContent">
    <?php get_search_form();
    if (have_posts()): ?>
    <h1>Search results for "<?php the_search_query(); ?>":</h1>
    <div id="searchResults">
        <?php while (have_posts()): the_post();
            $templatePartBeginning = 'templates/postdisplay';
            if (get_post_type() == 'product'):
                $templatePartBeginning = 'woocommerce/content';
            endif;
            get_template_part($templatePartBeginning, get_post_type());
        endwhile; ?>
    </div>
    <nav id="pagination"><?php echo paginate_links(array(
        'prev_text' => '&larr;',
        'next_text' => '&rarr;',
        'type' => 'list'
    )); ?></nav>
    <?php else: ?>
        <h1>No results found for "<?php the_search_query(); ?>".</h1>
    <?php endif; ?>
</div>
<?php get_footer(); ?>