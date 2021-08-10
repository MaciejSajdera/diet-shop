<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package poradnia
 */

?>

<div class="advantages-container">

<h2><?php echo get_field('advantages_title'); ?></h2>

    <div class="advantages-wrapper">
        <?php
        $box_1 = get_field('advantages_info_1');
        if( $box_1 ): ?>
            <a href="<?php echo get_permalink(3495) ?>" class="advantage-box">
                <img src="<?php echo esc_url( $box_1['box_image'] ); ?>" alt="<?php echo esc_attr( $box_1['image']['alt'] ); ?>" />
                <div class="content">
                    <p><?php echo $box_1['box_header']; ?></p>
                    <span><?php echo $box_1['box_description']; ?></span>
                </div>
            </a>
        <?php endif; ?>
        <?php
        $box_2 = get_field('advantages_info_2');
        if( $box_2 ): ?>
            <a href="<?php echo get_permalink(3499) ?>" class="advantage-box">
                <img src="<?php echo esc_url( $box_2['box_image'] ); ?>" alt="<?php echo esc_attr( $box_2['image']['alt'] ); ?>" />
                <div class="content">
                    <p><?php echo $box_2['box_header']; ?></p>
                    <span><?php echo $box_2['box_description']; ?></span>
                </div>
            </a>
        <?php endif; ?>
        <?php
        $box_3 = get_field('advantages_info_3');
        if( $box_3 ): ?>
            <a href="<?php echo get_permalink(10) ?>" class="advantage-box">
                <img src="<?php echo esc_url( $box_3['box_image'] ); ?>" alt="<?php echo esc_attr( $box_3['image']['alt'] ); ?>" />
                <div class="content">
                    <p><?php echo $box_3['box_header']; ?></p>
                    <span><?php echo $box_3['box_description']; ?></span>
                </div>
            </a>
        <?php endif; ?>

    </div>

</div>