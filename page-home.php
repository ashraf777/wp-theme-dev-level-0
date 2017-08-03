<?php get_header(); ?>

<div class="row">
  <div class="col-xx-12">
    <div id="ashraf-carousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <!-- <ol class="carousel-indicators">
        <li data-target="#ashraf-carousel" data-slide-to="0" class="active"></li>
      </ol> -->

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">

        <?php
            $arg_cat = array(
              'include' => '8 , 9, 10',
            );

            $categories = get_categories($arg_cat);
            $count = 0;
            $bullets = '';
            // var_dump($categories);
            foreach ($categories as $category):
              $arg = array(
                'type' => 'post',
                'posts_per_page' => 1,
                'category__in' => $category->term_id,
                'category__not_in' => array(11),
              );
                $lastBlog = new WP_Query($arg);
                if( $lastBlog->have_posts() ):

                  while( $lastBlog->have_posts() ) : $lastBlog->the_post(); ?>
                  <!-- <div class="col-xs-12 col-sm-4">
                    <?php //get_template_part('content', 'featured'); ?>
                  </div> -->
                  <div class="item <?php if($count == 0): echo 'active'; endif; ?>">
                    <?php the_post_thumbnail('full'); ?>
                    <div class="carousel-caption">
                      <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
                      <small><?php the_category(' '); ?></small>
                    </div>
                  </div>

                  <?php $bullets .= '<li data-target="#ashraf-carousel" data-slide-to="'.$count.'" class="'; ?>
                  <?php if($count == 0): $bullets .= 'active'; endif; ?>
                  <?php $bullets .= '"></li>'; ?>

                  <?php endwhile;
                endif;
                wp_reset_postdata();
                $count++;
            endforeach;
        ?>
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <?php echo $bullets ?>
        </ol>


      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#ashraf-carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#ashraf-carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8">
    <?php
      if( have_posts() ):
        while( have_posts() ) : the_post();
          get_template_part('content', get_post_format());
        endwhile;
      endif;
    ?>
  </div>



  <!-- <div class="col-xs-8 col-sm-8"> -->
    <?php
    // 2 posts but not the latest
    // $lastBlog = new WP_Query('type=post&posts_per_page=2&offset=1');
    // if( $lastBlog->have_posts() ):
    //   while( $lastBlog->have_posts() ) : $lastBlog->the_post();
    //     get_template_part('content', get_post_format());
    //   endwhile;
    // endif;
    // wp_reset_postdata();
    ?>
  <!-- </div>
  <div class="col-xs-8 col-sm-8"> -->
    <?php
    // category posts
    // $arg = array(
    //   'type' => 'post',
    //   'posts_per_page' => 2,
    //   'offset' => 1,
    // );
    // $lastBlog = new WP_Query($arg);
    // if( $lastBlog->have_posts() ):
    //   while( $lastBlog->have_posts() ) : $lastBlog->the_post();
    //     get_template_part('content', get_post_format());
    //   endwhile;
    // endif;
    // wp_reset_postdata();
    ?>
  <!-- </div> -->

  <div class="col-xs-12 col-sm-4">
    <?php get_sidebar(); ?>
  </div>

</div>

<?php get_footer(); ?>
