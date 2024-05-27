<?php
/**
 * Template Name: Custom Home Page
 *
 * @package Cinema Theater
 * @subpackage cinema_theater
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php get_template_part( 'template-parts/home/slider' ); ?>
	<?php get_template_part( 'template-parts/home/latest-release' ); ?>
	<?php get_template_part( 'template-parts/home/featured-actors' ); ?>
	<?php get_template_part( 'template-parts/home/home-content' ); ?>
</main>

<?php get_footer();