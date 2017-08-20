<?php get_header(); ?>
/*
	Template Name: Portfolio Template
*/

<div class="row">
	<div class="col-xs-8 col-sm-8">

  <?php
	$arg = array('post_type' => 'portfolio' , 'post_per_page' => 3 );
	$loop = new WP_Query( $arg );

    if( $loop->have_posts() ):
      while( $loop->have_posts() ) : $loop->the_post(); ?>

				<?php get_template_part('content', 'archive'); ?>

    <?php endwhile;
        endif;
    ?>
  </div>

  <div class="col-xs-4 col-sm-4">
    <?php get_sidebar(); ?>
  </div>

</div>

<?php get_footer(); ?>
