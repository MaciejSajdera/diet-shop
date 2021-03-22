<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package poradnia
 */
$info_section_2 = get_field("info_section_2");
?>

<section class="info-section home-section-offer">

	<div class="bg-image overflow-up overflow-up__250" style="background-image: url(<?php echo $info_section_2['image'] ?>);"></div>

	<div class="wrapper-flex-column gs_reveal gs_reveal_fromLeftShort">
		<h3><?php echo $info_section_2['title'] ?></h3>
		<p> <?php echo $info_section_2['description'] ?> </p>
		<a class="green-button green-button--pointer" href="<?php echo $info_section_2['link_destination'] ?>"> <span> <?php echo $info_section_2['link_title'] ?> </span></a>
		
	</div>

</section>