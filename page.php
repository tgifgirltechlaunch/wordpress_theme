<?php get_header(); ?>

<div class="wrap">
<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">

<?php
while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; // End of the loop.
?>

</main><!-- #main -->
</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>