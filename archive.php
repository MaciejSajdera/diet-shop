<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package poradnia
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="entry-header common-template__header">
			<?php
				the_archive_title( '<h1 class="entry-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .entry-header -->



				<div class="blog-content">

					<div class="blog-feed-wrapper">

						<div class="swiper-button-next green-button green-button--pointer"><span></span></div>

							<div class="blog-grid swiper-container swiper-container-blog-posts-blog">

									<div class="swiper-wrapper">

									<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				
				echo '<a class="post-wrapper swiper-slide" href="'. get_permalink() .'">';

				echo "<div class='post-upper-wrapper'>";
						echo '<div class="blog-post"  style="background-image: url(' .get_the_post_thumbnail_url(). ')">';

						echo '</div>';

				echo "</div>";

				echo "<div class='post-bottom-wrapper'>";

					echo "<div class='post-bottom-wrapper__text-content'>";
						echo '<p>' . get_the_title() . '</p>';

						echo '<p>' . get_the_date( 'j F Y', $post->ID ) . '</p>';
					echo "</div>";

				echo '</div>';

			echo '</a>';

				?>

				<?php

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				// get_template_part( 'template-parts/content', get_post_type() );

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
			// the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
