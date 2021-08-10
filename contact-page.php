<?php

/*
 * Template Name: Contact Page Template
 * description: >-
  Page template without sidebar
 */

get_header();

$contact_data = get_field("contact_data");
?>

<div id="primary" class="content-area">

	<main id="primary" class="contact">

			<header class="entry-header common-template__header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<section class="contact-data-section">

					<div class="contact-data__wrapper">

						<div class="contact-data__wrapper-text">
							<p><?php echo $contact_data['address_1'] ?></p>
							<p><?php echo $contact_data['address_2'] ?></p>
							<p><a href="tel:<?php echo str_replace(' ', '', $contact_data['phone_number']) ?>"><?php echo $contact_data['phone_number'] ?></a></p>
							<p><a href="mailto:<?php echo $contact_data['email'] ?>"><?php echo $contact_data['email'] ?></a></p>
							<p>skype: <a href="skype:<?php echo $contact_data['skype'] ?>?add"><?php echo $contact_data['skype'] ?></a></p>
							<p><?php echo $contact_data['bank_account'] ?></p>
						</div>

						<div class="contact-data__wrapper-map">
							<div id="map_wrapper">
								<div class="mapping map_canvas">
								<iframe width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=al.%20Rzeczypospolitej%204/75,%20%2080-369%20Gda%C5%84sk+(JL%20Poradnia)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
								</div>
							</div>
						</div>

					</div>

			</section>

			<section class="contact-form-section">
				<div class="contact-form">

					<div class="common-template__header">
						<h1>Masz pytanie?</h1>
					</div><!-- .entry-header -->

					<div class="wrapper-flex-column">
							<?php
							echo  do_shortcode('[contact-form-7 id="14" title="Contact form 1"]');
							?>
					</div>

				</div> 
			</section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();