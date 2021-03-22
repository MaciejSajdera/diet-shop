<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package poradnia
 */
$cookie_info = get_field('cookie_info', get_option( 'page_on_front' ));

$body_classes = get_body_class();
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<div class="page">

			<div class="site-info">
			
				<?php if (!in_array('page-template-contact-page', $body_classes)) :

				?>

				<div class="site-footer__main">
						
					<div class="col col-1">
							<h5> Lokalizacja </h5>
						<div id="map_wrapper">
							<div class="mapping map_canvas"></div>
						</div>
					</div>


					<div class="col col-2 contact-form">
							<h5> Masz pytania? </h5>
							<div class="wrapper-flex-column">
									<?php
									echo  do_shortcode('[contact-form-7 id="14" title="Contact form 1"]');
									?>
							</div>
					</div> 

					<!-- <div class="col col-3">
					<h3>Metody płatności</h3>
					<p class="payment-method method-paypal"></p>
					<p class="payment-method method-przelewy24"></p>
					<p class="payment-method method-zapobraniem"></p>
					</div> -->

					<div class="col col-3">
					<h5>Poradnia Dietetyki Medycznej</h5>
					<p>al. Rzeczypospolitej 4/75 </p>
					<p>80-369 Gdańsk</p>
					<p>tel.: + 48 698 179 478</p>
					<p>email: jluty.poradnia@gmail.com</p>
					<p>Skype: jluty.poradnia</p>
					<p>79 1050 1764 1000 0091 2065 4687</p>

					
					<div class="social-icons social-icons-footer">

						<a href="https://www.facebook.com/venus.hurtownia" target="_blank" class="social-icons__icon social-icons-footer__icon">
						<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="48" viewBox="0 0 24 24" width="36"><rect fill="none" height="42" width="36"/><path fill="#000" d="M22,12c0-5.52-4.48-10-10-10S2,6.48,2,12c0,4.84,3.44,8.87,8,9.8V15H8v-3h2V9.5C10,7.57,11.57,6,13.5,6H16v3h-2 c-0.55,0-1,0.45-1,1v2h3v3h-3v6.95C18.05,21.45,22,17.19,22,12z"/></svg>
						</a>

						<a href="https://www.instagram.com/venus_hurtowniakielce/" target="_blank" class="social-icons__icon social-icons-footer__icon fixed-ig-icon">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
						<path fill="#000" class="st0" d="M15 2.8c4 0 4.4 0 6 0.1 1.4 0.1 2.2 0.3 2.8 0.5 0.7 0.3 1.2 0.6 1.7 1.1 0.5 0.5 0.8 1 1.1 1.7C26.8 6.8 27 7.6 27.1 9c0.1 1.6 0.1 2 0.1 6s0 4.4-0.1 6c-0.1 1.4-0.3 2.2-0.5 2.8 -0.3 0.7-0.6 1.2-1.1 1.7 -0.5 0.5-1 0.8-1.7 1.1 -0.5 0.2-1.3 0.4-2.8 0.5 -1.6 0.1-2 0.1-6 0.1s-4.4 0-6-0.1c-1.4-0.1-2.2-0.3-2.8-0.5 -0.7-0.3-1.2-0.6-1.7-1.1 -0.5-0.5-0.8-1-1.1-1.7C3.2 23.2 3 22.4 2.9 21c-0.1-1.6-0.1-2-0.1-6s0-4.4 0.1-6C3 7.6 3.2 6.8 3.4 6.2 3.7 5.5 4 5.1 4.5 4.5c0.5-0.5 1-0.8 1.7-1.1C6.8 3.2 7.6 3 9 2.9 10.6 2.8 11 2.8 15 2.8M15 0.2c-4 0-4.5 0-6.1 0.1C7.3 0.3 6.2 0.6 5.3 0.9c-1 0.4-1.8 0.9-2.6 1.7C1.8 3.5 1.3 4.3 0.9 5.3c-0.4 0.9-0.6 2-0.7 3.6C0.2 10.5 0.1 11 0.1 15c0 4 0 4.5 0.1 6.1 0.1 1.6 0.3 2.7 0.7 3.6 0.4 1 0.9 1.8 1.7 2.6 0.8 0.8 1.7 1.3 2.6 1.7 0.9 0.4 2 0.6 3.6 0.7 1.6 0.1 2.1 0.1 6.1 0.1s4.5 0 6.1-0.1c1.6-0.1 2.7-0.3 3.6-0.7 1-0.4 1.8-0.9 2.6-1.7 0.8-0.8 1.3-1.7 1.7-2.6 0.4-0.9 0.6-2 0.7-3.6 0.1-1.6 0.1-2.1 0.1-6.1s0-4.5-0.1-6.1c-0.1-1.6-0.3-2.7-0.7-3.6 -0.4-1-0.9-1.8-1.7-2.6 -0.8-0.8-1.7-1.3-2.6-1.7 -0.9-0.4-2-0.6-3.6-0.7C19.5 0.2 19 0.2 15 0.2L15 0.2z"></path>
						<path fill="#000" class="st0" d="M15 7.4c-4.2 0-7.6 3.4-7.6 7.6s3.4 7.6 7.6 7.6 7.6-3.4 7.6-7.6S19.2 7.4 15 7.4zM15 20c-2.7 0-5-2.2-5-5s2.2-5 5-5c2.7 0 5 2.2 5 5S17.7 20 15 20z"></path>
						<circle fill="#000" class="st0" cx="22.9" cy="7.1" r="1.8"></circle>
						</svg>
						</a>


						</div>

					</div>

				</div>

				<?php
				endif;
				?>


				<div class="footer-bottom">

					<span><?php echo footer_copyright(); ?> Copyright © <?php echo get_bloginfo( 'name' ); ?></span>


					<a class="terms-link" href="<?php echo get_permalink(3) ?>">Polityka prywatności</a>

					<a class="terms-link" href="<?php echo get_permalink(34) ?>">Kontakt</a>

				</div>



				<div class="icons-info">
					Icons made by:
					<a href="https://www.flaticon.com/authors/nikita-golubev" title="Nikita Golubev">Nikita Golubev</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
					<a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
					
				</div>

			</div><!-- .site-info -->
		</div>

		<!-- <div id="cookie-text">
		<p><?php echo $cookie_info ?></p>
		</div> -->
		

		<div class="scrollToTopBtn">
			<div class="scrollToTopBtn__svg-wrapper">
				<svg xmlns="http://www.w3.org/2000/svg" height="42" viewBox="0 0 24 24" width="36"><path d="M0 0h24v24H0z" fill="none"/><path fill="#fff" d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z"/></svg>
			</div>
		</div>

		<div class="cookie-law-notification">
			<button id="cookie-law-button" class="green-button">Akceptuję</button>
			<p><?php echo $cookie_info ?></p>
		</div>
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
