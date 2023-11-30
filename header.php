<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
        <header>
            <a id="logoHeader" href="<?php echo esc_url(site_url('/')); ?>">
                <img class="siteLogo" src="<?php echo get_theme_file_uri('/images/logo.png'); ?>" alt="Ofori Beauty logo">
            </a>
            <nav id="headerMenu">
            <i id="closeMenu" class="fa fa-window-close fa-2x" aria-hidden="true"></i>
            <?php wp_nav_menu(array('theme_location' => 'topMenu')); ?>
            <?php if (is_user_logged_in()): ?>
                <a href="<?php echo esc_url(site_url('/account')); ?>" class="headerRight nonIcon <?php if (is_account_page()) echo 'current-menu-item' ?>">Account</a>
                <a href="<?php echo wp_logout_url(); ?>" class="headerRight nonIcon">Log Out</a>
                </nav>
                <a href="<?php echo esc_url(site_url('/cart')); ?>" class="headerRight">
                    <i class="fa fa-shopping-cart <?php if (is_cart()) echo 'current-menu-item' ?>" aria-hidden="true"></i>
                </a>
            <?php else: ?>
                <a href="<?php echo wp_login_url(); ?>" class="headerRight nonIcon">Log In</a>
                <a href="<?php echo wp_registration_url(); ?>" class="headerRight nonIcon">Sign Up</a>
                </nav>
            <?php endif; ?>
            <i class="fa fa-bars headerRight" aria-hidden="true"></i>
            <a id="searchButton" href="<?php echo esc_url(site_url('/search')); ?>" class="headerRight">
                <i class="fa fa-search" aria-hidden="true"></i>
            </a>
        </header>
        <div id="mainContent">