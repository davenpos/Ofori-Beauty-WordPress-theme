<?php defined('ABSPATH') || exit;

global $product;

if (empty($product) || !$product->is_visible()) {
	return;
}
?>
<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
<div class="serviceDescription"><?php the_excerpt(); ?></div>
<p class="price"><?php echo $product->get_price_html(); ?></p>