<?php

/*
 * Template Name: Pricing Page Template
 * description: >-
  Page template without sidebar
 */

get_header();

$price_box_1 = get_field("price_box_1");
$price_box_2 = get_field("price_box_2");
$price_box_3 = get_field("price_box_3");
$price_box_4 = get_field("price_box_4");
$price_box_5 = get_field("price_box_5");
$price_box_6 = get_field("price_box_6");

$price_boxes = array($price_box_1, $price_box_2, $price_box_3, $price_box_4, $price_box_5, $price_box_6);

?>


<div id="primary" class="content-area">

	<main id="primary" class="pricing">

			<header class="entry-header common-template__header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<section class="prices-section">

				<div class="prices-container">

					<div class="prices-wrapper">

					<?php
						foreach ($price_boxes as &$price_box) {

							echo '<div class="price-box">';

							echo '<h4>' . $price_box['header'] . '</h4>';

							echo '<p class="price-box__description">' . $price_box['description'] . '</h4>';

							echo '<p class="price-box__price">' . $price_box['price'] . '</p>';

							echo '<a class="pointer pointer--green" href="' . $price_box['link_destination_1'] . '" target="_blank"> <span> ' . $price_box['link_title_1'] . ' </span></a>';

							echo '<a class="pointer pointer--green" href="' . $price_box['link_destination_2'] . '" target="_blank"> <span> ' . $price_box['link_title_2'] . ' </span></a>';

							echo '</div>';
						}
					?>

					</div>

				</div>

				<?php



				?>

			</section>

</main>
	</div>

	
<?php
get_footer();