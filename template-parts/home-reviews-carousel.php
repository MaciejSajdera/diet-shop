
                            <?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package poradnia
 */

?>

<section class="reviews-carousel section-full-width gs_reveal">
	<h3 class="section-header">Opinie</h3>
  <div class="swiper-container-reviews">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->

	<?php 

        $reviews = array(
            'post_type'=> 'opinie',
            'orderby'        => 'DESC',
        );    

        $your_query = new WP_Query( $reviews );

        // "loop" through query (even though it's just one page) 
        while ( $your_query->have_posts() ) :
            $your_query->post_title(); $your_query->the_post();

            echo '<div class="swiper-slide slide-review">';

                echo '<div class="slide-review__content-wrapper">';
                echo '<p>';
                echo '<img src="'. content_url().'/uploads/quote.png" >';
                echo get_the_content();
                echo '</p>';
                echo '</div>';

                echo '<p class="slide-review__author">'. get_the_title() . '</p>';

            echo '</div>';




        endwhile;
        // reset post data (important!)
        wp_reset_postdata();
        ?>



	</div>

    <div class="swiper-button-prev"></div>
     <div class="swiper-button-next"></div>


     

  </div>

    <div class="swiper-container-reviews__bottom">
        <div class="swiper-pagination swiper-pagination-reviews"></div>
    </div>
  

</section>