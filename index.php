<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package poradnia
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php

			$args = array(
				'post_type' => 'post',
				'posts_per_page'=> 999999
			);

			$blog_query = new WP_Query( $args );


		if ( $blog_query->have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header class="entry-header common-template__header">
					<?php single_post_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
				<?php
			endif;
			?>
			
			<div class="blog-content">

					<div class="blog-feed-wrapper">

						<div class="swiper-button-next green-button green-button--pointer"><span></span></div>

						<div class="blog-grid swiper-container swiper-container-blog-posts-blog">

							<div class="swiper-wrapper">
							<?php



									/* Start the Loop */
									while ( $blog_query->have_posts() ) : $blog_query->the_post();

										echo "<div class='post-wrapper swiper-slide'>";

											echo "<div class='post-upper-wrapper'>";
													echo '<a class="blog-post" href="'. get_permalink() .'" style="background-image: url(' .get_the_post_thumbnail_url(). ')">';

													echo '</a>';

											echo "</div>";

											echo "<div class='post-bottom-wrapper'>";

												echo "<div class='post-bottom-wrapper__text-content'>";
													echo '<p>' . get_the_title() . '</p>';

													echo '<p>' . get_the_date( 'dS M Y', $post->ID ) . '</p>';
												echo "</div>";

											echo '</div>';

										echo "</div>";

									endwhile;

									?>
								</div><!-- swiper-wrapper --> 

						</div><!-- blog-grid --> 

						<div class="swiper-button-prev green-button green-button--pointer"><span></span></div>
					</div>
					
					<div class="blog-navigation">
						<?php
							echo wp_list_categories();
						?>

							<li class="recent-posts">
								Ostatnie wpisy

								<?php
									$recent_posts = wp_get_recent_posts(array(
										'post_type' => 'post',
										'numberposts' => 3, // Number of recent posts thumbnails to display
										'post_status' => 'publish' // Show only the published posts
									));

									echo '<ul>';

									foreach( $recent_posts as $post_item ) : ?>
										<li>
											<a href="<?php echo get_permalink($post_item['ID']) ?>">
											<?php echo $post_item['post_title'] ?>
											</a>
										</li>
									<?php endforeach;

									echo '</ul>';
									?>

							</li>



					</div>
					
					<?php

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</div>
			
			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
