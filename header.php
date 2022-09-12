<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if (wp_title('', false)) {
										echo ' : ';
									} ?><?php bloginfo('name'); ?></title>

	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<link href="<?php echo esc_url(get_template_directory_uri()); ?>/img/icons/favicon.ico" rel="shortcut icon">
	<link href="<?php echo esc_url(get_template_directory_uri()); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>


	<script>
		// conditionizr.com
		// configure environment tests
		conditionizr.config({
			assets: '<?php echo esc_url(get_template_directory_uri()); ?>',
			tests: {}
		});
	</script>

</head>

<body <?php body_class(); ?>>

	<!-- wrapper -->
	<div class="wrapper">

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