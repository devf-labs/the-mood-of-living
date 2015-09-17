<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<h2 class="message-header"><?php _e( 'You don\'t have any items in your cart.', 'woocommerce' ) ?> <a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>"><?php _e( 'Start shopping', 'woocommerce' ) ?></a></h2>

<?php do_action('woocommerce_cart_is_empty'); ?>