<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Akëro Clothing Co</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width">

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href=<?=base_url('css/main.css');?>>
		<link rel="stylesheet" type="text/css" href=<?=base_url("css/skeleton.css");?>>

		<!-- jQuery -->
		<script src=<?=base_url("js/jquery-1.8.3.js");?> type="text/javascript" charset="utf-8"></script>
		<script src=<?=base_url("js/jqbanner.js");?> type="text/javascript" charset="utf-8"></script>
		<script src=<?=base_url("js/main2.js");?> type="text/javascript" charset="utf-8"></script>

	</head>
	<body>
		<div id="wrapper">

			<section id="top_nav">
				<div class="container">
					<p>
						<?=$email?> | <a href=<?=base_url("wishlistController");?>>wishlist</a> | <a href=<?=base_url("logoutController");?>>logout</a>
						<span class="cart_info"> <a href=<?=base_url("cartController");?>>cart</a> ( <?=$this->session->userdata('cartItems');?> ) | <a href="#">checkout</a> </span>
					</p>
				</div>
			</section> <!-- end top_nav -->
			
			<header>
				<nav class="container">
					<a href="/" id="logo"><img src=<?=base_url("images/logo.png");?> alt="Akëro Clothing Logo"></a>
					<div id="center_header_nav">
						<ul id="header_nav">
							<li><a href="/">home </a></li>
							<li class="nav_divider"> / </li>
							<li><a href=<?=base_url("productsController");?>>purchase </a></li>
							<li class="nav_divider"> / </li>
							<li><a href="/">custom </a></li>
							<li class="nav_divider"> / </li>
							<li><a href="/">about us </a></li>
						</ul>
					</div> <!-- end center_header_nav -->

					<div id="nav_clear_fix" class="clear_fix"></div>

					<!-- MAKE THESE SPRITES -->
					<div id="center_icons">
						<ul id="icons">
							<li><a target="_blank" href="https://www.facebook.com/akeroclothing?ref=br_tf"><img src=<?=base_url("images/icons/facebook.png");?>></a></li>
							<li><a target="_blank" href="#"><img src=<?=base_url("images/icons/twitter.png");?>></a></li>
							<li><a target="_blank" href="#"><img src=<?=base_url("images/icons/instagram.png");?>></a></li>
							<li><a target="_blank" href="#"><img src=<?=base_url("images/icons/tumblr.png");?>></a></li>
						</ul>
					</div> <!-- end center_icons -->
				</nav>
			</header>