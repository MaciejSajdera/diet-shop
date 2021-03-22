<?php

/*
 * Template Name: First Visit Page Template
 * description: >-
  Page template without sidebar
 */

get_header();
$first_visit_page_part_1 = get_field('first_visit_page_part_1');
$file = get_field('file');
?>
<div id="primary" class="content-area">

	<main id="primary" class="first-visit">

		<header class="entry-header common-template__header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<section class="first_visit_page_part_1">
			
			<div class="wrapper-flex-column text-wrapper">

				<p> <?php echo $first_visit_page_part_1["paragraph_1"]; ?> </p>

				<p> <?php echo $first_visit_page_part_1["paragraph_2"]; ?> </p>

				<p> <?php echo $first_visit_page_part_1["paragraph_3"]; ?> </p>

			</div>

		</section>

		<section class="first_visit_page_part_2">

			<div class="steps-container">

				<h2><?php echo get_field('steps_title'); ?></h2>

				<div class="steps-wrapper">
					<?php
					$box_1 = get_field('step_1');
					if( $box_1 ): ?>
						<div class="step-box">
							<img src="<?php echo esc_url( $box_1['box_image'] ); ?>" alt="<?php echo esc_attr( $box_1['image']['alt'] ); ?>" />
							<div class="content">
								<p><?php echo $box_1['box_header']; ?></p>
								<span><?php echo $box_1['box_description']; ?></span>
							</div>
						</div>
					<?php endif; ?>
					<?php
					$box_2 = get_field('step_2');
					if( $box_2 ): ?>
						<div class="step-box">
							<img src="<?php echo esc_url( $box_2['box_image'] ); ?>" alt="<?php echo esc_attr( $box_2['image']['alt'] ); ?>" />
							<div class="content">
								<p><?php echo $box_2['box_header']; ?></p>
								<span><?php echo $box_2['box_description']; ?></span>
							</div>
						</div>
					<?php endif; ?>
					<?php
					$box_3 = get_field('step_3');
					if( $box_3 ): ?>
						<div class="step-box">
							<img src="<?php echo esc_url( $box_3['box_image'] ); ?>" alt="<?php echo esc_attr( $box_3['image']['alt'] ); ?>" />
							<div class="content">
								<p><?php echo $box_3['box_header']; ?></p>
								<span><?php echo $box_3['box_description']; ?></span>
							</div>
						</div>
					<?php endif; ?>

				</div>


				<a class="green-button green-button--pointer" href="<?php echo $file; ?>" target="_blank"> <span> <?php echo get_field('link_title') ?> </span></a>

			</div>



		</section>

	</main>

</div>
	
<?php
get_footer();