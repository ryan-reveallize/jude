<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jude
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
   <script>	window.onload = function() {
    var myOptions = {
        center: new google.maps.LatLng(40.744556,-73.987378),
        zoom: 18,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: true
    };

    var map = new google.maps.Map(document.getElementById("map"), myOptions);
}</script>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header>
			<nav id="site-navigation" class="main-navigation">
				<div class="d-flex d-md-none justify-content-between align-items-center py-2 px-3">
					<?php the_custom_logo(); ?>
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
				</div>
				<div class="nav-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'	 => 'side-menu',
						)
					);
					?>
					<ul class="nav-social">
						<?php if (get_field('facebook', 'option')) : ?>
							<li>
								<a href="<?= the_field('facebook', 'option') ?>" class="icon-facebook">
									<?php include get_template_directory() . '/assets/facebook.svg'; ?>
								</a>
							</li>
						<?php endif; ?>

						<?php if (get_field('instagram', 'option')) : ?>
							<li>
								<a href="<?= the_field('instagram', 'option') ?>" class="icon-instagram">
									<?php include get_template_directory() . '/assets/instagram.svg'; ?>
								</a>
							</li>
						<?php endif; ?>
						<?php if (get_field('email', 'option')) : ?>
							<li>
								<a href="mailto:<?= the_field('email', 'option') ?>" class="icon-paperplane">
									<?php include get_template_directory() . '/assets/paperplane.svg'; ?>
								</a>
							</li>
						<?php endif; ?>
					</ul>

				</div>
			</nav><!-- #site-navigation -->
		</header>