<?php
/**
 * Template part for displaying checkout-steps
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package poradnia
 */
?>

<div class="checkout-steps">
<a href="<?php echo esc_url( wc_get_cart_url() ); ?>">KOSZYK</a>
<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>">KASA</a>
</div>

