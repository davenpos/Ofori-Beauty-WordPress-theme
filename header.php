<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
        <header>
            <a href="<?php echo esc_url(site_url('/')); ?>">
                <img class="siteLogo" src="<?php echo get_theme_file_uri('/images/logo.png'); ?>" alt="Ofori Beauty logo">
            </a>
            <?php wp_nav_menu(array('theme_location' => 'topMenu')); ?>
            <div class="headerRight">
                <?php if (is_user_logged_in()): ?>
                    <a href="<?php echo esc_url(site_url('/account')); ?>">Account</a>
                    <a href="<?php echo wp_logout_url(); ?>">Log Out</a>
                    <a href="<?php echo esc_url(site_url('/cart')); ?>">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </a>
                <?php else: ?>
                    <a href="<?php echo wp_login_url(); ?>">Log In</a>
                    <a href="<?php echo wp_registration_url(); ?>">Sign Up</a>
                <?php endif; ?>
                <a id="searchButton" href="">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </a>
            </div>
        </header>
        <div id="mainContent">