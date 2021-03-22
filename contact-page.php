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
							<p><a href="skype:<?php echo $contact_data['skype'] ?>?add"><?php echo $contact_data['skype'] ?></a></p>
							<p><?php echo $contact_data['bank_account'] ?></p>
						</div>

						<div class="contact-data__wrapper-map">
							<div id="map_wrapper">
								<div class="mapping map_canvas"></div>
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