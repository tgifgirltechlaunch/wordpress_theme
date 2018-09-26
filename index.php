<?php get_header(); ?>
<!-- SECTION: Intro -->
<section class="collective has-padding" id="intro">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h4>About Me</h4>
				</div>
				<div class="col-md-9">					
					<div class="video-player">
						
						<video id="video_synth" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="568" height="300" poster="./img/video-cover.jpg" data-setup='{}'>
							<source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4" />
							<source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm" />
							<source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg" />
							<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
						</video>
					</div>
				</div>
			</div>
			<div class="row">
					<?php
						query_posts( array('category_name'=>'About') );
						while ( have_posts() ) : the_post();
					?>
						<div class="col-md-4 col-sm-12 col-xs-12 about-wrap">
							<h1 class="about-h1"><i class="far fa-star"></i></h1>
							<h2 class="about-h2"><?php the_title(); ?></h2>
							<span class="about-img"><?php if ( has_post_thumbnail() ): // check for the featured image ?>
								<a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>" class="opacity"><?php the_post_thumbnail(); ?></a> <!--echo the featured image-->
							</span>
					<?php endif; ?>
							<div class="about-content"><?php the_content(); // echo the excerpt ?></div>
					
						</div>
					<?php
						endwhile;
						wp_reset_query(); // resets main query
					?>
					
			</div>
		</div>
	</section>
	<!-- END SECTION: Intro -->
	
	<!-- SECTION: Skills -->
	<section class="skills has-padding alternate-bg" id="technical">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4>Technical Skills</h4>
				</div>
			</div>
			
			<div class="row">
				<?php while(have_posts()) { the_post(); ?>
					
					<?php if(get_the_category()[0]->name == 'Technical-Skills') { $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" );?>
						<a href="<?= get_post_custom()['link'][0] ?>">
							<div class="col-md-3 col-sm-6 col-xs-12" style="background-color: #ffffff; min-width: 225px; min-height: 225px; padding: 20px; margin: 20px;">
								<article class="skills-member">
									<figure>
										<figcaption>
											<h2><?php the_title() ?></h2>
											<p><?php the_content() ?></p>
											<div style="min-width: 225px; min-height: 225px;"><img src="<?= $thumbnail[0] ?>"></div>
										</figcaption>
									</figure>
								</article>
							</div>
						</a>
					<?php } ?>
				<?php } ?>
			</div>
			<div>
				<?php dynamic_sidebar('sidebar_1_widget') ?>
			</div>
		</div>
	</section>
	<!-- END SECTION: skills -->
	<!-- SECTION: certifications-->
	<section class="certifications has-padding-tall">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4>Certifications</h4>
				</div>
			</div>
			<div class="row">
				<?php
					query_posts( array('category_name'=>'Certifications') );
					while ( have_posts() ) : the_post();
				?>
					<div class="col-md-4 col-sm-4 certifications-container">
						<i class="fas fa-certificate"></i>
						<div class="certifications-wrapper">
							<p class="certifications-text"><?php the_title(); ?></p>
							<p class="certifications-number"><?= get_post_custom()['cert-num'][0] // echo the certificate number ?></p>
							<ul>
								<li><p class="certifications-issue">issued: <?= get_post_custom()['cert-issue-date'][0] // echo the certificate issue date ?></p></li>
								<li><p class="certifications-exp">expires: <?= get_post_custom()['cert-exp-date'][0] // echo the certificate expiration date ?></p></li>
							</ul>
							
						</div>

					</div>
				<?php
					endwhile;
					wp_reset_query(); // resets main query
				?>
			</div>

		</div>
				</section>
	<!-- END SECTION: certifications -->
	<!-- SECTION: Articles -->
	<section class="has-padding alternate-bg" id="projects">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<h4>Latest Projects</h4>
				</div>
			</div>

			<div class="row text-center">
					<!--Carousel Wrapper-->
					<?php 
						$slides = array(); 
						$args = array( 'nopaging'=>true, 'category_name' => 'projects' );
						$slider_query = new WP_Query( $args );
						if ( $slider_query->have_posts() ) {
							while ( $slider_query->have_posts() ) {
								$slider_query->the_post();
								if(has_post_thumbnail()){
									$temp = array();
									$thumb_id = get_post_thumbnail_id();
									$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
									$thumb_url = $thumb_url_array[0];
									$temp['title'] = get_the_title();
									$temp['excerpt'] = get_the_excerpt();
									$temp['image'] = $thumb_url;
									$slides[] = $temp;
								}
							}
						} 
						wp_reset_postdata();
					?>
					<?php if(count($slides) > 0) { ?>
					<div id="carousel-with-lb" class="carousel slide carousel-multi-item" data-ride="carousel">

						<!--Controls-->
						<div class="controls-top">
							<a class="btn-floating btn-secondary" href="#carousel-with-lb" data-slide="prev"><i class="far fa-arrow-alt-circle-left"></i></a>
							<a class="btn-floating btn-secondary" href="#carousel-with-lb" data-slide="next"><i class="far fa-arrow-alt-circle-right"></i></a>
						</div>
						<!--/.Controls-->
				
						<!--Slides and lightbox-->				
						<div class="carousel-inner mdb-lightbox" role="listbox">
							<div id="mdb-lightbox-ui"></div>
							<!-- slide-->
							<div class="carousel-item text-center active">
								<?php $i=0; foreach($slides as $slide) { extract($slide); ?>
									<?php if($i < 4) { ?>
										<figure class="col-md-3 col-sm-6 d-md-inline-block">
										
											<img src="<?php echo $image ?>" alt="<?php echo esc_attr($title); ?>">
										</figure>
									<?php } ?>
								<?php $i++; } ?>
							</div>
							<!--/ slide-->
							<!-- slide-->
							<div class="carousel-item text-center">
								<?php $i=4; foreach($slides as $slide) {  extract($slide);; ?>
									<?php if($i > 4) { ?>
										<figure class="col-md-3 col-sm-6 d-md-inline-block">
											
											<img src="<?php echo $image ?>" alt="<?php echo esc_attr($title); ?>">
										</figure>
									<?php } ?>
								<?php $i++; } ?>
							</div>
							<!--/ slide-->
						</div>
						<!--/.Slides-->
					<?php } ?>
					</div>
					<!--/.Carousel Wrapper-->
			</div>

			
		</div>
	</section>
	<!-- END SECTION: Articles -->
	<!-- SECTION: education -->
	<section class="education has-padding" id="education">
		<div class="container education-intro">
			<div class="row">
				<div class="col-md-12">
					<h4>Education</h4>
				</div>
			</div>
			<div class="row">
			<?php while(have_posts()) { the_post(); ?>
				<?php if(get_the_category()[0]->name == 'Education') { ?>
					<div class="col-md-6 content-left">
						<h2 class="year"><?= get_post_custom()['ed-year'][0] ?></h2>
						<h2 class="gpa"><?= get_post_custom()['ed-gpa'][0] ?></h2>
					</div>
					<div class="col-md-6 content-right">
						<h2 class="school"><i class="fas fa-graduation-cap"></i> <?= get_post_custom()['ed-school'][0] ?></h2>
						<h2 class="school-location"><?= get_post_custom()['ed-city'][0] ?>, <?= get_post_custom()['ed-state'][0] ?></h2>
						<h2 class="degree"><?= get_post_custom()['ed-degree'][0] ?></h2>
					</div>

				<?php }} ?>
			</div>
			
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 no-padding">
					<article class="item wp5">
						<figure class="has-overlay">
							<figcaption class="overlay">
								<div class="like-share-wrapper">
									<ul>
										<li>
											<div class="like-button-wrapper">
												<a href="#" class="like_button"><i class="like-counter fa fa-heart-o"></i></a>
												<span class="count">0</span>
											</div>
										</li>
									</ul>
								</div>
								<div class="freebie-content">
									<span class="date">03/01/2016</span>
									<h2>Sedna HTML CSS Template</h2>
									<div class="group">
										<a href="http://tympanus.net/codrops/2015/08/11/freebie-sedna-one-page-website-template/" class="btn secondary">Download</a>
									</div>
								</div>
							</figcaption>

							<img src="<?php echo get_template_directory_uri(); ?>/img/sedna-freebie.jpg" alt="Sedna Freebie">
						</figure>
					</article>
				</div>
				<div class="col-md-6 no-padding">
					<article class="item wp6">
						<figure class="has-overlay">
							<figcaption class="overlay">
								<div class="like-share-wrapper">
									<ul>
										<li>
											<div class="like-button-wrapper">
												<a href="#" class="like_button"><i class="like-counter fa fa-heart-o"></i></a>
												<span class="count">0</span>
											</div>
										</li>
									</ul>
								</div>
								<div class="freebie-content">
									<span class="date">03/01/2016</span>
									<h2>Land.io Sketch Template</h2>
									<div class="group">
										<a href="http://tympanus.net/codrops/2015/09/16/freebie-land-io-ui-kit-landing-page-design-sketch/" class="btn secondary">Download</a>
									</div>
								</div>
							</figcaption>
							<img src="<?php echo get_template_directory_uri(); ?>/img/landio-freebie.jpg" alt="Land.io Freebie">
							
							
						</figure>
					</article>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 no-padding">
					<article class="item wp7">
						<figure class="has-overlay">
							<figcaption class="overlay">
								<div class="like-share-wrapper">
									<ul>
										<li>
											<div class="like-button-wrapper">
												<a href="#" class="like_button"><i class="like-counter fa fa-heart-o"></i></a>
												<span class="count">0</span>
											</div>
										</li>
									</ul>
								</div>
								<div class="freebie-content">
									<span class="date">03/01/2016</span>
									<h2>Synthetica HTML5/CSS3 Template</h2>
									<div class="group">
										<a href="http://tympanus.net/codrops/?p=26570" class="btn secondary">Download</a>
									</div>
								</div>
							</figcaption>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/freebie-03.jpg" alt="Synthetica Freebie">
						</figure>
					</article>
				</div>
				<div class="col-md-6 no-padding">
					<article class="item wp8">
						<figure class="has-overlay">
							<figcaption class="overlay">
								<div class="like-share-wrapper">
									<ul>
										<li>
											<div class="like-button-wrapper">
												<a href="#" class="like_button"><i class="like-counter fa fa-heart-o"></i></a>
												<span class="count">0</span>
											</div>
										</li>
									</ul>
								</div>
								<div class="freebie-content">
									<span class="date">03/01/2016</span>
									<h2>Free logo concepts by Koby West</h2>
									<div class="group">
										<a href="#" class="btn secondary">Download</a>
									</div>
								</div>
							</figcaption>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/freebie-04.jpg" alt="Synthetica">
						</figure>
					</article>
				</div>
			</div>
		</div>
	</section>
	<!-- END SECTION: education -->
	<!-- SECTION: Timeline -->
	<section id="experience">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4>Relevent Work Experience</h4>
				</div>
			</div>
					
			<div class="row">
				<?php
					query_posts( array('category_name'=>'Experience') );
					while ( have_posts() ) : the_post();
				?>
					<div class="col-md-12 wp4 timeline">
						
						<h2><?= get_post_custom()['exp-year'][0] ?></h2>

						<ul>
							<li>
								<h3><?php the_title(); // echo the content ?></h3>
								<p><?php the_content(); // echo the content ?></p>
								<p class="time">~<?= get_post_custom()['exp-month'][0] ?> <?= get_post_custom()['exp-year'][0] ?></p>
							</li>
						</ul>

					</div>
				<?php
					endwhile;
					wp_reset_query(); // resets main query
				?>
			</div>

		</div>
	</section>
	
	<!-- END SECTION: Timeline -->
	<!-- SECTION: Get started -->
	<section class="get-started has-padding text-center" id="get-started">
		<div class="container">
			<div class="row">
				<?php
					query_posts( array('category_name'=>'Quote') );
					while ( have_posts() ) : the_post();
				?>
					<div class="col-md-12 wp4">
						<span class="about-img"><?php if ( has_post_thumbnail() ): // check for the featured image ?>
							<a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>" class="opacity"><?php the_post_thumbnail(); ?></a> <!--echo the featured image-->
						</span>
				<?php endif; ?>
						<h2><?php the_content(); // echo the content ?></h2>
						<h3>-<?= get_post_custom()['quote-author'][0] // echo the quote author ?></h3>

						<a class="btn secondary-white" href="<?= get_post_custom()['resume-link'][0] ?>">Resume</a>
					</div>
				<?php
					endwhile;
					wp_reset_query(); // resets main query
				?>
			</div>
		</div>
	</section>
	<!-- END SECTION: Get started -->

<?php get_footer(); ?>