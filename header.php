<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title>Chemytours - Excursiones, Tours, Four Wheels y otros más.</title>

	<link href="<?php echo esc_url(get_template_directory_uri()); ?>/img/icons/favicon.ico" rel="shortcut icon">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="86400">

	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="language" content="spanish">
	<meta name="copyright" content="Codev - Code Development">
	<meta name="author" content="Wilmin José Sánchez, wjose260@gmail.com">
	<meta name="keywords" content="chemy, chemytours, villa isabella, mamey, Los Hidalgos, red house on the beach, tours, viajes, four wheels, villas, alojamientos, jet sky, alquilar catamaran, barcos, comida, playa, playa la ensenada">
	<meta itemprop="telephone" content="8299635529">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

		<header class="header clear" role="banner">
			<div class="container-header">
				<div class="container">
					<div class="row">

						<div class="logo col-sm-3">
							<a href="<?php echo esc_url(home_url()); ?>">
								<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/logo.png" alt="Logo" class="logo-img">
							</a>

							<div class="menu-btn">
								<i class="fa-solid fa-bars"></i>
							</div>
						</div>

						<div class="nav-area col-sm-6">
							<nav class="nav" role="navigation">
								<?php chemytours_nav(); ?>
							</nav>
						</div>

						<div class="social-header col-sm-3">
							<ul class="social-nav">

								<li> <a href=""><i class="fa-brands fa-facebook"></i></a></li>
								<li> <a href=""><i class="fa-brands fa-instagram"></i></a></li>


							</ul>
						</div>




					</div>
				</div>
			</div>
		</header>

		<!-- wrapper -->
	<main class="wrapper">