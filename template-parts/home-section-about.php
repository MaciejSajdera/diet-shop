<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package poradnia
 */
$info_section_1 = get_field("info_section_1");
?>

<section class="info-section home-section-about">

	<div class="bg-image gs_reveal" style="background-image: url(<?php echo $info_section_1['image'] ?>);"></div>

	<div class="wrapper-flex-column gs_reveal gs_reveal_fromRightShort">
		<h3><?php echo $info_section_1['title'] ?></h3>
		<p> <?php echo $info_section_1['description'] ?> </p>
		<a class="green-button green-button--pointer" href="<?php echo $info_section_1['link_destination'] ?>"> <span> <?php echo $info_section_1['link_title'] ?> </a>
		
	</div>

</section>