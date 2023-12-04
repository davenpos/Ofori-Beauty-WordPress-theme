<?php
require get_theme_file_path('/inc/searchroute.php');

function oforib_filesForSite() {
	wp_enqueue_style('main_stylesheet', get_stylesheet_uri());
	wp_enqueue_style('font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('custom_font', '//fonts.googleapis.com/css2?family=Roboto&display=swap');
	wp_enqueue_script('main-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
	wp_localize_script('main-js', 'siteData', array('url' => get_site_url()));
}

add_action('wp_enqueue_scripts', 'oforib_filesForSite');

function oforib_siteFeatures() {
	add_theme_support('title-tag');
	register_nav_menu('topMenu', 'Top Menu');
	register_nav_menu('resourcesMenu', 'Resources');
	register_nav_menu('policiesMenu', 'Policies');
}

add_action('after_setup_theme', 'oforib_siteFeatures');

function oforib_addWidgetSidebar() {
	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'id' => 'blogSidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>'
	));
	register_sidebar(array(
		'name' => 'Socials',
		'id' => 'socials',
		'before_widget' => '<div>',
		'after_widget' => '</div>'
	));
}

add_action('widgets_init', 'oforib_addWidgetSidebar');

function oforib_loginHeaderURL() {
	return esc_url(site_url('/'));
}

add_filter('login_headerurl', 'oforib_loginHeaderURL');

function oforib_loginScreenCSS() {
	wp_enqueue_style('main_stylesheet', get_stylesheet_uri());
	wp_enqueue_style('custom_font', '//fonts.googleapis.com/css2?family=Roboto&display=swap');
}

add_action('login_enqueue_scripts', 'oforib_loginScreenCSS');

function oforib_commentsDisplay($comments, $depth) {
	foreach ($comments as $comment):
		$commentsQuery = new WP_Comment_Query();
		$replies = $commentsQuery->query(array(
			'status' => 'approve',
			'parent' => $comment->comment_ID
		)); ?>
		<li class="comment <?php if ($comment->comment_author != 'A WordPress Commenter') echo 'byuser comment-author-' . strtolower($comment->comment_author) ?> <?php if ($comment->comment_author == get_the_author()) echo 'bypostauthor' ?> <?php echo (($depth - 1) % 2 == 0) ? 'even' : 'odd'; ?> depth-<?php echo $depth; ?> <?php if ($replies) echo 'parent' ?>" id="comment-<?php echo $comment->comment_ID; ?>">
		<div id="div-comment-<?php echo $comment->comment_ID; ?>" class="comment-body">
			<p class="commentContent"><?php echo $comment->comment_content ?></p>
			<p class="smallBlogPostText">Commented by <?php echo $comment->comment_author; ?> on <?php echo date_create_from_format('Y-m-d H:i:s', $comment->comment_date)->format('F d, Y | g:i a'); ?></p>
			<div class="reply">
				<a rel="nofollow" class="comment-reply-link" href="<?php echo get_permalink(get_the_ID()) . '/?replytocom=' . $comment->comment_ID . '#respond'; ?>" data-commentid="<?php echo $comment->comment_ID; ?>" data-postid="<?php echo $comment->comment_ID; ?>" data-belowelement="div-comment-<?php echo $comment->comment_ID; ?>" data-respondelement="respond" data-replyto="Reply to <?php echo $comment->comment_author; ?>" aria-label="Reply to <?php echo $comment->comment_author; ?>">
					Reply
				</a>
			</div>
		</div>
		<?php if ($replies): ?>
			<ul class="children">
				<?php $depth++;
				oforib_commentsDisplay($replies, $depth); ?>
			</ul>
		<?php endif; ?>
	<?php endforeach;
}

function oforib_redirectUsers() {
	if (!is_user_logged_in() && (is_account_page() || is_cart() || is_checkout())):
		wp_redirect(wp_login_url());
		exit;
	endif;
	
	global $wp;
	if (is_user_logged_in() && $wp->request == 'account/downloads') {
		wp_redirect(esc_url(site_url('/account')));
		exit;
	}
}

add_action('template_redirect', 'oforib_redirectUsers');

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

function oforib_removeWooCommerceCustomization($wp_customize) {
	$wp_customize->remove_section('woocommerce_product_images');
	$wp_customize->remove_setting('woocommerce_shop_page_display');
	$wp_customize->remove_control('woocommerce_shop_page_display');
	$wp_customize->remove_setting('woocommerce_category_archive_display');
	$wp_customize->remove_control('woocommerce_category_archive_display');
	$wp_customize->remove_setting('woocommerce_catalog_columns');
	$wp_customize->remove_control('woocommerce_catalog_columns');
}

add_action('customize_register', 'oforib_removeWooCommerceCustomization');

function oforib_editAccountMenu($items) {
	$items['edit-address'] = 'Address';
	unset($items['downloads']);
	unset($items['customer-logout']);
	return $items;
}

add_filter('woocommerce_account_menu_items', 'oforib_editAccountMenu');

function oforib_ignoreCertainFiles($exclude_filters) {
	$exclude_filters[] = 'oforibeautytheme/node_modules';
	$exclude_filters[] = 'oforibeautytheme/.git';
	$exclude_filters[] = 'oforibeautytheme/.gitignore';
	return $exclude_filters;
}

add_filter('ai1wm_exclude_themes_from_export', 'oforib_ignoreCertainFiles');

//https://github.com/woocommerce/woocommerce/tree/trunk/plugins/woocommerce/templates