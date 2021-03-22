<?php

/*
 * Template Name: Home Page Template
 * description: >-
  Page template without sidebar
 */

global $post;

get_header('home');
?>
	<main id="primary" class="home-main">

		<?php
			// get_template_part( 'template-parts/home-categories-descriptions-random', 'page' );
		?>

		<?php
			get_template_part( 'template-parts/home-section-about', 'page' );
		?>

		<?php
			get_template_part( 'template-parts/home-section-offer', 'page' );
		?>

		<?php
			get_template_part( 'template-parts/home-reviews-carousel', 'page' );
		?>

		<?php
			// get_template_part( 'template-parts/home-carousel', 'page' );
		?>

		<?php
			get_template_part( 'template-parts/home-blog-carousel', 'page' );
		?>

		</section>

	</main>

	
<?php
get_footer();