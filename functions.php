<?php
function oforib_filesForSite() {
	wp_enqueue_style('main_stylesheet', get_stylesheet_uri());
	wp_enqueue_style('font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('custom_font', '//fonts.googleapis.com/css2?family=Roboto&display=swap');
	/*wp_enqueue_script('main-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
	wp_localize_script('main-js', 'siteData', array(
		'root_url' => get_site_url(),
		'nonce' => wp_create_nonce('wp_rest')
	));*/
}

add_action('wp_enqueue_scripts', 'oforib_filesForSite');

function oforib_siteFeatures() {
	add_theme_support('title-tag');
	register_nav_menu('topMenu', 'Top Menu');
	register_nav_menu('resourcesMenu', 'Resources');
	register_nav_menu('policiesMenu', 'Policies');
}

add_action('after_setup_theme', 'oforib_siteFeatures');

//npm install @wordpress/scripts --save-dev