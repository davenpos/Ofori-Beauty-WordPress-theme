<?php $categories = get_the_category();
$categoryList = '';

if ($categories):
    foreach ($categories as $cat):
        $categoryList .= '<a href="' . get_category_link($cat->term_id) .'">' . $cat->cat_name . '</a>, ';
    endforeach;
endif;
if (is_search()): ?>
    <h2 class="postSearchResultsPage"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php else: ?>
    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<?php endif; ?>
<p class="smallBlogPostText">Posted by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author(); ?></a><?php echo ($categories) ? ' under ' . trim($categoryList, ', ') : ''; ?> on <?php the_time('F j, Y'); ?></p>
<?php the_excerpt(); ?>