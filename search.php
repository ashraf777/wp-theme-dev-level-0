<?php get_header(); ?>

<div class="row">
	<div class="col-xs-8 col-sm-8">

		<div class="row text-center">

  <?php
    if( have_posts() ):;
      while( have_posts() ) : the_post(); ?>
      <?php get_template_part('content', 'search'); ?>
    <?php endwhile;
        endif;
    ?>
		</div>
		<hr>
  </div>

  <div class="col-xs-4 col-sm-4">
    <?php get_sidebar(); ?>
  </div>

</div>

<?php get_footer(); ?>
