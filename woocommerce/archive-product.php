<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
// do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header common-template__header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>

		<?php if (!is_product_category()) {
		echo '<p>Gotowe jadłospisy</p>';
		}


		?>

	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	// do_action( 'woocommerce_archive_description' );
	?>
</header>

<?php

		$body_classes = get_body_class();

	if (is_shop(10) && !in_array('search-results', $body_classes) && !in_array('search-no-results', $body_classes)  )  {

		$cat_args = array(
			'orderby'    => 'name',
			'order' => 'ASC',
			'hide_empty' => 'true',
			'parent' => 0,
			'orderby'=>"menu_order",
		);

		$product_categories = get_terms( 'product_cat', $cat_args );

		if( !empty($product_categories) ){

			echo '<section class="shop">';

			echo '<div class="shop-paragraph">' . get_field("shop_paragraph", get_option( 'woocommerce_shop_page_id' )) . '</div>';

			echo '<div class="shop-grid">';

			foreach ($product_categories as $key => $category) {

				$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
				$category_name = $category->name;
				$image = wp_get_attachment_url( $thumbnail_id );
				$short_description = get_field('category_short_description', $category);

				if ($category->term_id == 377) {
					continue;
				}

				if (!$image) {
					$image = wc_placeholder_img_src();
				}

				if (!empty($category)) {
					echo '<a id="'.$category->term_id.'" class="category-tile" href="'.get_term_link($category).'">';
					echo '<div class="category-tile__image" style="background-image: url('.$image.')";></div>';

					echo '<div class="category-tile__text-wrapper">';
					echo '<p class="category-tile__name">' .$category_name. '</p>';
					// if (strlen($short_description) > 0) {
						echo '<p class="category-tile__short-description">' .$short_description. '</p>';
					// }
					echo '</div>';

					echo '</a>';
				}


			}

			echo '</div>';
			echo '</section>';
		}

	} else  {


		if ( is_product_category() ) {

			// $term_id  = get_queried_object_id();
			// $taxonomy = 'product_cat';
	
			// // Get subcategories of the current category
			// $terms    = get_terms([
			// 	'taxonomy'    => $taxonomy,
			// 	'order' => 'ASC',
			// 	'hide_empty'  => true,
			// 	'parent'      => $term_id,
			// ]);


			echo '<section class="shop__category-description"><div class="shop__category-description__wrapper">' . category_description() . '</div></section>';

			// echo '<ul class="subcategories-list">';
	
			// // Loop through product subcategories WP_Term Objects
			// foreach ( $terms as $term ) {
			// 	$term_link = get_term_link( $term, $taxonomy );
	
			// 	echo '<li class="'. $term->slug .'"><a href="'. $term_link .'" class="checkout-button button alt wc-forward my-checkout-button">'. $term->name .'</a></li>';
			// }
	
			// echo '</ul>';
		}

		?>
		<section class="wrapper-flex-column shop-wrapper">

			<div class="main-shop-products">
			<?php
			if ( woocommerce_product_loop() ) {

				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked woocommerce_output_all_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );

				
				woocommerce_product_loop_start();

				//additional pagination
				// woocommerce_pagination();


				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action( 'woocommerce_shop_loop' );

						wc_get_template_part( 'content', 'product' );
					}
				}

				woocommerce_product_loop_end();

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}

			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );

			/**
			 * Hook: woocommerce_sidebar.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			// do_action( 'woocommerce_sidebar' );

			?>
			</div>
		</section>


	<?php
	};

	?>

<?php
get_footer( 'shop' );
