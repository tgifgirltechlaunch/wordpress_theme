<?php 
//include my widgets
include_once get_template_directory() . '/widgets/tl_skills.php';
?>
<?php 
function techlaunch_lm_portfolio_assets() {
	// all styles
	wp_enqueue_style('boostrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
	wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css');
	wp_enqueue_style('fontawesome', 'https://vjs.zencdn.net/7.1.0/video-js.css');
	wp_enqueue_style( 'flickity', get_stylesheet_directory_uri() . '/css/flickity.min.css', array(), 20160429 );
	wp_enqueue_style( 'normalize', get_stylesheet_directory_uri() . '/css/normalize.min.css', array(), 20160429 );
	wp_enqueue_style( 'animate', get_stylesheet_directory_uri() . '/css/animate.min.css', array(), 20160429 );
	wp_enqueue_style('style', get_stylesheet_uri());
	

	// all scripts
	// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer )
	wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), '4.1.3', true );
	wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array(''), 'v1', true );
	wp_enqueue_script( 'videojs-ie8', 'https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js', array(''), '6', true );
	wp_enqueue_script( 'videojs', 'https://vjs.zencdn.net/7.1.0/video.js', array(''), '7.1.0', true );

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/min/modernizr-2.8.3-respond-1.4.2.min.js', array(), '2.8.3', true );
	wp_enqueue_script( 'retina', get_template_directory_uri() . '/js/min/retina.min.js', array(), '', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/min/jquery.waypoints.min.js', array(), '', true );
	wp_enqueue_script( 'flickity', get_template_directory_uri() . '/js/min/flickity.pkgd.min.js', array(), '', true );
	wp_enqueue_script( 'scripts-min', get_template_directory_uri() . '/js/min/scripts-min.js', array(), '', true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), '', true );
}

add_action('wp_enqueue_style', 'techlaunch_lm_portfolio_assets');
add_action('wp_enqueue_scripts', 'techlaunch_lm_portfolio_assets');

?>


<?php
function theme_setup()
{
	// register_nav_menu( $location, $description );
	register_nav_menus(array(
	'primary' => __('Menu', "techlaunch_lm_portfolio_menus"),
	'social-menu' => __('Social menu')
	));
}

add_action('after_setup_theme', 'theme_setup');

?>

<?php
add_theme_support('post-thumbnails', [
	'post',
	'page',
	'custom-post-type-name',
]);
?>

<?php
function tl_widgets() {
	register_sidebar([
		'name' => 'Sidebar1',
		'id' => 'sidebar_1_widget',
		'before_widget' => '<div class="chw-widget">',
		'after_widget' => '</div>',
		'before_title'=> '<h2 class="chw-title">',
		'after_title' => '</h2>'
	]);
	register_widget('tl_skills');
}

add_action('widgets_init', 'tl_widgets');
?>