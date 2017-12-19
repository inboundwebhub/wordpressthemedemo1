<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Kreative
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/favicon.ico" >
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-spy="scroll" data-target="#nav-wrap">
		<header class="mobile">

			      <div class="row">

			         <div class="col full">

			            <div class="logo">
			               <a href="#"><img alt="" src="<?php bloginfo('template_url') ?>/images/logo.png"></a>
			            </div>
						 <?php if ( is_front_page()) : ?>
			            		<nav id="nav-wrap">

			               <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
				            <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>
									<?php
									$args = array(
										'menu_class' => 'nav',
										'menu_id' => 'nav',
										'menu' => 'Main menu'
									);
									wp_nav_menu($args);
									?>
			            </nav>
						 <?php else : ?>
							 	<nav id="nav-wrap">
									<a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
									<a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>
									<ul id="nav" class="nav">
										<li><a href="index.html">Site</a></li>
										<li class="active"><a href="#">Journal</a></li>
									</ul>
								</nav>
						 <?php endif; ?>
			         </div>

			      </div>

		</header>


