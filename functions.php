<?php
function oforib_filesForSite() {
	wp_enqueue_style('main_stylesheet', get_stylesheet_uri());
	wp_enqueue_style('font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('custom_font', '//fonts.googleapis.com/css2?family=Roboto&display=swap');
	wp_enqueue_script('main-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
	/*wp_localize_script('main-js', 'siteData', array(
		'root_url' => get_site_url(),
		'nonce' => wp_create_nonce('wp_rest')
	));*/
}

add_action('wp_enqueue_scripts', 'oforib_filesForSite');

function oforib_siteFeatures() {
	add_theme_support('title-tag');
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
}

add_action('widgets_init', 'oforib_addWidgetSidebar');

function oforib_redirectSubscribers() {
	$currentUserRoles = wp_get_current_user()->roles;

	if (count($currentUserRoles) == 1 && $currentUserRoles[0] == 'subscriber'):
		wp_redirect(site_url('/'));
		exit;
	endif;
}

add_action('admin_init', 'oforib_redirectSubscribers');

function oforib_removeAdminBar() {
	$currentUserRoles = wp_get_current_user()->roles;

	if (count($currentUserRoles) == 1 && $currentUserRoles[0] == 'subscriber'):
		show_admin_bar(false);
	endif;
}

add_action('wp_loaded', 'oforib_removeAdminBar');

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

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
add_filter('woocommerce_cart_item_thumbnail', '__return_empty_string');

//Not working
/*function oforib_removeAccountMenuLinks($menuItems) {
	unset($menuItems['Download']);
	unset($menuItems['Logout']);

	return $menuItems;
}

add_filter('woocommerce_account_menu_items', 'oforib_removeAccountMenuLinks');*/