<?php

/*
 * Template Name: Offer Page Template
 * description: >-
  Page template without sidebar
 */

get_header();

$offer_page_part_1 = get_field("offer_page_part_1");
$offer_page_part_2 = get_field("offer_page_part_2");
$offer_page_part_3 = get_field("offer_page_part_3");
$offer_page_part_4 = get_field("offer_page_part_4");
?>
<div id="primary" class="content-area">

	<main id="primary" class="offer-page">

		<header class="entry-header common-template__header">
						<!-- <?php single_post_title( '<h1 class="entry-title">', '</h1>' ); ?> -->
		</header><!-- .entry-header -->

		<section class="offer-page__part1">

			<div class="wrapper-flex">
			
				<div class="wrapper-flex-column text-wrapper gs_reveal gs_reveal_fromRightShort">

					<h3 class="common-elements__section-title">
						<?php
						echo $offer_page_part_1["header"];
						?>
					</h3>

					<p class="text-bold">
					<?php echo $offer_page_part_1["paragraph_1"]; ?>
					</p>

					<p>
					<?php echo $offer_page_part_1["paragraph_2"]; ?>
					</p>

				</div>


				<div class="bg-image overflow-up overflow-up__50" style="background-image: url(<?php echo $offer_page_part_1["image"] ?>);"></div>

			</div>

			<div class="wrapper-flex">

					<div class="wrapper-flex-column text-wrapper gs_reveal gs_reveal_fromLeftShort">
			
					<p>
					<?php echo $offer_page_part_2["paragraph_1"]; ?>
					</p>

					<p>
					<?php echo $offer_page_part_2["paragraph_2"]; ?>
					</p>

					</div>

					<div class="bg-image overflow-up overflow-up__100" style="background-image: url(<?php echo $offer_page_part_2["image"]; ?>);"></div>

			</div>
			
		</section>


		<section class="offer-page__part2">

			<div class="wrapper-flex">

				<div class="wrapper-flex-column text-wrapper gs_reveal gs_reveal_fromRightShort">

					<h3 class="common-elements__section-title">
						<?php
						echo $offer_page_part_3["header"];
						?>
					</h3>

					<p class="text-bold">
					<?php echo $offer_page_part_3["paragraph_1"]; ?>
					</p>

					<p>
					<?php echo $offer_page_part_3["paragraph_2"]; ?>
					</p>
				</div>

				<div class="bg-image overflow-up overflow-up__50" style="background-image: url(<?php echo $offer_page_part_3["image"] ?>);"></div>

			</div>

		</section>

		<section class="offer-page__part3">
		<?php
			echo '<div class="offer-container">';

				echo '<div class="offer-box">';
				echo '<img src="' . $offer_page_part_4["image_1"] . '">';
				echo '<p class="offer-text">' . $offer_page_part_4["description_1"] . '</p>';
				echo '</div>';

				echo '<div class="offer-box">';
				echo '<img src="' . $offer_page_part_4["image_2"] . '">';
				echo '<p class="offer-text">' . $offer_page_part_4["description_2"] . '</p>';
				echo '</div>';

				echo '<div class="offer-box">';
				echo '<img src="' . $offer_page_part_4["image_3"] . '">';
				echo '<p class="offer-text">' . $offer_page_part_4["description_3"] . '</p>';
				echo '</div>';

				echo '<div class="offer-box">';
				echo '<img src="' . $offer_page_part_4["image_4"] . '">';
				echo '<p class="offer-text">' . $offer_page_part_4["description_4"] . '</p>';
				echo '</div>';

				echo '<div class="offer-box">';
				echo '<img src="' . $offer_page_part_4["image_5"] . '">';
				echo '<p class="offer-text">' . $offer_page_part_4["description_5"] . '</p>';
				echo '</div>';

				echo '<div class="offer-box">';
				echo '<img src="' . $offer_page_part_4["image_6"] . '">';
				echo '<p class="offer-text">' . $offer_page_part_4["description_6"] . '</p>';
				echo '</div>';

			echo '</div>';
		?>
		</section>

	</main>
</div>

	
<?php
get_footer();