<?php

/*
 * Template Name: Consultations Page Template
 * description: >-
  Page template without sidebar
 */

get_header();
$consultations_page_part_1 = get_field('consultations_page_part_1');
$consultations_page_part_2 = get_field('consultations_page_part_2');

?>

<div id="primary" class="content-area">

	<main id="primary" class="consultations">

			<header class="entry-header common-template__header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<section class="consultations_page_part_1">

				<div class="wrapper-flex">

					<div class="wrapper-flex-column text-wrapper">

						<h3 class="common-elements__section-title">
									<?php
									echo $consultations_page_part_1["header_1"];
									?>
						</h3>

						<p>
							<?php echo $consultations_page_part_1["paragraph_1"]; ?>
						</p>

					</div>

					<div class="bg-image gs_reveal" style="background-image: url(<?php echo $consultations_page_part_1["image"] ?>);"></div>

					<div class="wrapper-flex-column text-wrapper gs_reveal gs_reveal_fromRightShort">

						<h3 class="common-elements__section-title">
									<?php
									echo $consultations_page_part_1["header_2"];
									?>
						</h3>

						<p>
							<?php echo $consultations_page_part_1["paragraph_2"]; ?>
						</p>

					</div>
					
				</div>

			</section>



			<section class="consultations_page_part_2">

			 <div class="wrapper-flex">

				<div class="wrapper-flex-column text-wrapper gs_reveal gs_reveal_fromLeftShort">

					<h3 class="common-elements__section-title">
						<?php echo $consultations_page_part_2["header_1"]; ?>
					</h3>

					<p>
						<?php echo $consultations_page_part_2["paragraph_1"]; ?>
					</p>

				</div>

				<a class="green-button green-button--pointer" href="<?php echo $consultations_page_part_2['link_destination'] ?>"> <span> <?php echo $consultations_page_part_2['link_title'] ?> </span></a>

			  </div>

			</section>

</main>
	</div>

	
<?php
get_footer();