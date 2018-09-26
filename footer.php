<!-- SECTION: Footer -->
<footer class="has-padding footer-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12 footer-nav">
					<ul class="footer-primary-nav">
						<li><a href="#intro">About</a></li>
						<li><a href="#technical">Technical</a></li>
						<li><a href="#projects">Projects</a></li>
						<li><a href="#education">Education</a></li>
						<li><a href="#experience">Experience</a></li>
					</ul>
					
					<div class="contact">
						<?php echo do_shortcode("[wpforms id='99' title='false' description='false']"); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="share">
						<ul>
							<li class="social"><?php wp_nav_menu(['theme_location'=>'social-menu', 'container_class'=>'social-menu']) ?></li>
						</ul>
					</div>
					<ul class="footer-secondary-nav">
						<li><p>A free portfolio theme for <a href="http://techlaunch.io"><em>Techlaunch Students</em></a></p></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- END SECTION: Footer -->

<?php wp_footer(); ?>