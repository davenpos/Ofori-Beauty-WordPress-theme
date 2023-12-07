<?php
function oforib_colorCustomizer($wp_customize) {
	$wp_customize->add_section('oforib_siteColors', array(
		'title' => __('Site Colours', 'Ofori Beauty'),
		'priority' => 30
	));

	$wp_customize->add_setting('oforib_background', array(
		'default' => '#fafafa',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Background Color Control', array(
		'label' => __('Background', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_background'
	)));
	
	$wp_customize->add_setting('oforib_mainContentText', array(
		'default' => '#222',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Main Content Text Color Control', array(
		'label' => __('Main Content Text', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_mainContentText'
	)));
	
	$wp_customize->add_setting('oforib_headerFooterAndSidebar', array(
		'default' => '#ffe1ee',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Header, Footer and Sidebar Color Control', array(
		'label' => __('Header, Footer and Sidebar', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_headerFooterAndSidebar'
	)));
	
	$wp_customize->add_setting('oforib_headerAndSidebarText', array(
		'default' => 'rgb(245, 83, 115)',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Header and Sidebar Text Color Control', array(
		'label' => __('Header and Sidebar Text', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_headerAndSidebarText'
	)));
	
	$wp_customize->add_setting('oforib_headerAndSidebarActiveText', array(
		'default' => 'rgb(245, 0, 160)',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Header and Sidebar Active Text Color Control', array(
		'label' => __('Header and Sidebar Active Text', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_headerAndSidebarActiveText'
	)));
	
	$wp_customize->add_setting('oforib_footerText', array(
		'default' => 'rgb(106, 95, 96)',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Footer Text Color Control', array(
		'label' => __('Footer Text', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_footerText'
	)));
	
	$wp_customize->add_setting('oforib_footerActiveText', array(
		'default' => 'rgb(59, 58, 58)',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Footer Active Text Color Control', array(
		'label' => __('Footer Active Text', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_footerActiveText'
	)));
	
	$wp_customize->add_setting('oforib_linkAndButton', array(
		'default' => 'rgb(245, 83, 115)',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Link and Button Color Control', array(
		'label' => __('Link and Button', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_linkAndButton'
	)));
	
	$wp_customize->add_setting('oforib_linkAndButtonHover', array(
		'default' => 'rgb(239, 139, 161)',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Link and Button Hover Color Control', array(
		'label' => __('Link and Button Hover', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_linkAndButtonHover'
	)));
	
	$wp_customize->add_setting('oforib_buttonText', array(
		'default' => 'white',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Button Text Color Control', array(
		'label' => __('Button Text', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_buttonText'
	)));
	
	$wp_customize->add_setting('oforib_textInput', array(
		'default' => 'rgb(59, 58, 58)',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Text Input Color Control', array(
		'label' => __('Text Input', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_textInput'
	)));
	
	$wp_customize->add_setting('oforib_textInputBackground', array(
		'default' => '#ffe1ee',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Text Input Background Color Control', array(
		'label' => __('Text Input Background', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_textInputBackground'
	)));

	require_once(dirname(__FILE__) . '/../alpha-color-picker/alpha-color-picker.php');

	$wp_customize->add_setting('oforib_transparentOverlay', array(
		'default' => 'rgba(245, 83, 115, 0.9)',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new Customize_Alpha_Color_Control($wp_customize, 'Transparent Overlay Color Control', array(
		'label' => __('Transparent Overlay', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_transparentOverlay'
	)));
	
	$wp_customize->add_setting('oforib_archiveHeaderText', array(
		'default' => '#bbbbbb',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Archive Header Text Color Control', array(
		'label' => __('Archive Header Text', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_archiveHeaderText'
	)));
	
	$wp_customize->add_setting('oforib_smallBlogPostText', array(
		'default' => '#777777',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Small Blog Post Text Color Control', array(
		'label' => __('Small Blog Post Text', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_smallBlogPostText'
	)));
	
	$wp_customize->add_setting('oforib_smallBlogPostTextHover', array(
		'default' => '#aaaaaa',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Small Blog Post Text Hover Color Control', array(
		'label' => __('Small Blog Post Text Hover', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_smallBlogPostTextHover'
	)));
	
	$wp_customize->add_setting('oforib_loginForm', array(
		'default' => 'rgb(252, 202, 220)',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Login Form Color Control', array(
		'label' => __('Login Form', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_loginForm'
	)));
	
	$wp_customize->add_setting('oforib_mobileMenuText', array(
		'default' => '#ffe1ee',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Mobile Menu Text Color Control', array(
		'label' => __('Mobile Menu Text', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_mobileMenuText'
	)));
	
	$wp_customize->add_setting('oforib_mobileMenuTextActive', array(
		'default' => 'white',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Mobile Menu Text Active Color Control', array(
		'label' => __('Mobile Menu Text Active', 'Ofori Beauty'),
		'section' => 'oforib_siteColors',
		'settings' => 'oforib_mobileMenuTextActive'
	)));
}

add_action('customize_register', 'oforib_colorCustomizer');

function oforib_customizerColorsCSS() { ?>
	<style type="text/css">
		body {
			background-color: <?php echo get_theme_mod('oforib_background'); ?>;
			color: <?php echo get_theme_mod('oforib_mainContentText'); ?>;
		}

		.sideMenu, body.woocommerce-account nav.woocommerce-MyAccount-navigation, header#siteHeader, footer#siteFooter, body.login, div#searchOverlay div#liveSearchResults {
			background-color: <?php echo get_theme_mod('oforib_headerFooterAndSidebar'); ?>;
		}
		
		.sideMenu ul li a, body.woocommerce-account nav.woocommerce-MyAccount-navigation ul li a, header#siteHeader nav#headerMenu li a, header#siteHeader a, header#siteHeader a i, header#siteHeader i.fa.fa-bars, body.error404 header#siteHeader li#menu-item-36 a, body.search header#siteHeader li#menu-item-36 a {
			color: <?php echo get_theme_mod('oforib_headerAndSidebarText'); ?>;
		}

		.sideMenu ul li a:hover, body.woocommerce-account nav.woocommerce-MyAccount-navigation ul li a:hover, .sideMenu ul li.is-active a, body.woocommerce-account nav.woocommerce-MyAccount-navigation ul li.is-active a, .sideMenu ul li a[aria-current=page], body.woocommerce-account nav.woocommerce-MyAccount-navigation ul li a[aria-current=page], .sideMenu ul li.current-menu-item a, body.woocommerce-account nav.woocommerce-MyAccount-navigation ul li.current-menu-item a, .sideMenu ul li.current_page_parent a, body.woocommerce-account nav.woocommerce-MyAccount-navigation ul li.current_page_parent a, .sideMenu ul a.current-menu-item, body.woocommerce-account nav.woocommerce-MyAccount-navigation ul a.current-menu-item, header#siteHeader nav#headerMenu li a:hover, header#siteHeader nav#headerMenu li.is-active a, header#siteHeader nav#headerMenu li a[aria-current=page], header#siteHeader nav#headerMenu li.current-menu-item a, header#siteHeader nav#headerMenu li.current_page_parent a, header#siteHeader nav#headerMenu a.current-menu-item, header#siteHeader a:hover, header#siteHeader a i:hover, header#siteHeader i.fa.fa-bars:hover, header#siteHeader i.current-menu-item, body.error404 header#siteHeader li#menu-item-36 a:hover, body.search header#siteHeader li#menu-item-36 a:hover, body.search header#siteHeader li#menu-item-37 a {
			color: <?php echo get_theme_mod('oforib_headerAndSidebarActiveText'); ?>;
		}

		footer#siteFooter, footer#siteFooter a:not(.wp-block-social-link-anchor), body.error404 footer#siteFooter li#menu-item-36 a, body.search footer#siteFooter li#menu-item-36 a, span.page-numbers.current, body.login button.wp-hide-pw span, body.login select#language-switcher-locales, a.button.wc-forward:hover {
			color: <?php echo get_theme_mod('oforib_footerText'); ?>;
		}

		body.login p a {
			color: <?php echo get_theme_mod('oforib_footerText'); ?> !important;
		}

		footer#siteFooter a:not(.wp-block-social-link-anchor):hover, footer#siteFooter ul.menu li.current-menu-item a, body.error404 footer#siteFooter li#menu-item-36 a:hover, body.search footer#siteFooter li#menu-item-36 a:hover, body.search footer#siteFooter li#menu-item-37 a {
			color: <?php echo get_theme_mod('oforib_footerActiveText'); ?>;
		}

		body.login p a:hover {
			color: <?php echo get_theme_mod('oforib_footerActiveText'); ?> !important;
		}

		input[type=submit], button[type=submit], a.button {
			background-color: <?php echo get_theme_mod('oforib_linkAndButton'); ?>;
			border-color: <?php echo get_theme_mod('oforib_linkAndButton'); ?>;
		}

		.button:not(.wp-hide-pw, .wc-forward), input.tnp-submit, a.wc-block-cart__submit-button, body.woocommerce-checkout div.textContent button.wc-block-components-checkout-place-order-button {
			background-color: <?php echo get_theme_mod('oforib_linkAndButton'); ?> !important;
			border-color: <?php echo get_theme_mod('oforib_linkAndButton'); ?> !important;
		}

		h1#fourOhFourPage, div.textContent :not(p.smallBlogPostText) a, div.blogArchives a, body.login div.privacy-policy-page-link a.privacy-policy-link, div#searchOverlay div#liveSearchResults h3 a {
			color: <?php echo get_theme_mod('oforib_linkAndButton'); ?>;
		}

		button.wc-block-cart-item__remove-link {
			color: <?php echo get_theme_mod('oforib_linkAndButton'); ?> !important;
		}

		input[type=submit]:hover, button[type=submit]:hover, a.button:hover {
			background-color: <?php echo get_theme_mod('oforib_linkAndButtonHover'); ?>;
		}

		.button:not(.wp-hide-pw, .wc-forward):hover, input.tnp-submit:hover, a.wc-block-cart__submit-button:hover, body.woocommerce-checkout div.textContent button.wc-block-components-checkout-place-order-button:hover {
			background-color: <?php echo get_theme_mod('oforib_linkAndButtonHover'); ?> !important;
		}

		div.textContent :not(p.smallBlogPostText) a:hover, body.login div.privacy-policy-page-link a.privacy-policy-link:hover {
			color: <?php echo get_theme_mod('oforib_linkAndButtonHover'); ?>;
		}

		button.wc-block-cart-item__remove-link:hover {
			color: <?php echo get_theme_mod('oforib_linkAndButtonHover'); ?> !important;
		}

		input[type=submit], button[type=submit], a.button {
			color: <?php echo get_theme_mod('oforib_buttonText'); ?>;
		}

		.button:not(.wp-hide-pw, .wc-forward), input.tnp-submit, a.wc-block-cart__submit-button, body.woocommerce-checkout div.textContent button.wc-block-components-checkout-place-order-button {
			color: <?php echo get_theme_mod('oforib_buttonText'); ?> !important;
		}

		input.tnp-email, input.tnp-name, body.woocommerce-checkout div.textContent input[type=text], body.woocommerce-checkout div.textContent input[type=email], body.woocommerce-checkout div.textContent input[type=tel] {
			color: <?php echo get_theme_mod('oforib_textInput'); ?> !important;
			background-color: <?php echo get_theme_mod('oforib_textInputBackground'); ?> !important;
		}

		div#searchform input#s {
			color: <?php echo get_theme_mod('oforib_textInput'); ?>;
		}

		div#searchform input#s, body.woocommerce-account input[type=text], body.woocommerce-account input[type=password], body.woocommerce-account input[type=email] {
			background-color: <?php echo get_theme_mod('oforib_textInputBackground'); ?>;
		}

		div#searchOverlay { background-color: <?php echo get_theme_mod('oforib_transparentOverlay'); ?>; }

		@media (max-width: 1000px) {
			header#siteHeader nav#headerMenu {
				background-color: <?php echo get_theme_mod('oforib_transparentOverlay'); ?>;
			}
			header#siteHeader nav#headerMenu li a, header#siteHeader nav#headerMenu div.headerRight a {
				color: <?php echo get_theme_mod('oforib_mobileMenuText'); ?>;
				display: table-row;
			}
			header#siteHeader nav#headerMenu li.current-menu-item a, header#siteHeader nav#headerMenu li.current_page_parent a, header#siteHeader nav#headerMenu a.current-menu-item, header#siteHeader nav#headerMenu li a:hover {
				color: <?php echo get_theme_mod('oforib_mobileMenuTextActive'); ?>;
			}
		}

		h1.archiveHeader {
			color: <?php echo get_theme_mod('oforib_archiveHeaderText'); ?>;
		}

		.smallBlogPostText, .smallBlogPostText a {
			color: <?php echo get_theme_mod('oforib_smallBlogPostText'); ?>;
		}

		.smallBlogPostText a:hover {
			color: <?php echo get_theme_mod('oforib_smallBlogPostTextHover'); ?>;
		}

		body.login form#loginform {
			background-color: <?php echo get_theme_mod('oforib_loginForm'); ?>;
		}
	</style>
<?php }

add_action('wp_head', 'oforib_customizerColorsCSS');