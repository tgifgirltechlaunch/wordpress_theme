<!DOCTYPE html>
<html>
<head>
	<title><?php wp_title() ?></title>
	<meta charset="<?php bloginfo('charset') ?>">
	<?php wp_head() ?>
</head>
<body>
<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="container-fluid">
		<div class="row">
			<div class="header-nav-wrapper">
				<div class="logo">
					<a href="/index.html">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/name.png" alt="Synthetica Freebie"></a>
				</div>
				<div class="primary-nav-wrapper">
					<nav>
						<ul class="primary-nav">
							<li><a href="#intro">About</a></li>
							<li><a href="#technical">Technical</a></li>
							<li><a href="#projects">Projects</a></li>
							<li><a href="#education">Education</a></li>
							<li><a href="#experience">Experience</a></li>
						</ul>
					</nav>
					<div class="secondary-nav-wrapper">
						<ul class="secondary-nav">
							<li class="social"><?php wp_nav_menu(['theme_location'=>'social-menu', 'container_class'=>'social-menu']) ?></li>
							<li class="search"><a href="#search" class="show-search"><i class="fa fa-search"></i></a></li>
						</ul>
					</div>
					<div class="search-wrapper">
						<ul class="search">
							<li>
								<input type="text" id="search-input" placeholder="Start typing then hit enter to search">
							</li>
							<li>
								<a href="#" class="hide-search"><i class="fa fa-close"></i></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="navicon">
					<a class="nav-toggle" href="#"><span></span></a>
				</div>
			</div>
		</div>
	</div>
	<header class="hero">
		<div class="carousel ">
			<div class="carousel-cell" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/hero-bg-01.jpg);">
				<div class="hero-bg">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center wp4">
								<h1 class="wp1"><?php bloginfo('name') ?></h1>
								<h3><?php bloginfo('description') ?></h3>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</header>