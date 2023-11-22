<?php

defined('ABSPATH') || exit;

global $product;

if (!$product->is_purchasable()) {
	return;
}

echo wc_get_stock_html($product);

if ($product->is_in_stock()): ?>

	<?php do_action('woocommerce_before_add_to_cart_form');

	if (is_user_logged_in()): ?>
		<form class="cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
			<?php do_action('woocommerce_before_add_to_cart_button'); ?>

			<?php
			do_action('woocommerce_before_add_to_cart_quantity');
			do_action('woocommerce_after_add_to_cart_quantity');
			?>

			<button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>

			<?php do_action('woocommerce_after_add_to_cart_button'); ?>
		</form>
	<?php endif;

	do_action('woocommerce_after_add_to_cart_form');
endif; ?>