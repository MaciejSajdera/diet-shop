<section class="blog-posts blog-posts-carousel gs_reveal">

				<a href=<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>>
				<h3 class="section-header">Blog</h3>
				</a>

		<div class="blog-posts-carousel__wrapper">

			<div class="swiper-container-blog-posts">
				<!-- Additional required wrapper -->
				<h4 class="section-header blog-posts-carousel__header">Najnowsze posty</h3>
				<div class="swiper-wrapper">
					<!-- Slides -->

						<?php
							$your_query = new WP_Query( array('pagename=blog', 'order' => 'DESC' ) );
							while ( $your_query->have_posts() ) :
								$your_query->post_title(); $your_query->the_post();

								echo '<div class="swiper-slide slide-blog-post">';

									echo '<a class="blog-post" href="'. get_permalink() .'">';

										echo '<div class="blog-post__upper" style="background-image: url(' . get_the_post_thumbnail_url() . ')"></div>';

										echo '<div class="blog-post-caption">';
										echo '<h3 class="uppercase">' . get_the_title() . '</h3>';
										echo '</div>';

									echo '</a>';

								echo '</div>';
					endwhile;
					// reset post data (important!)
					wp_reset_postdata();
					?>
				</div>

				<div class="swiper-container-blog-posts__bottom">

					<div class="swiper-pagination swiper-pagination-blog-posts"></div>

					<a class="button button__outline--white button__outline--white--pointer" href=<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>><span>Zobacz wszystkie</span></a>

				</div>


			</div>

		</div>

	</section>
	