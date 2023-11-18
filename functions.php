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