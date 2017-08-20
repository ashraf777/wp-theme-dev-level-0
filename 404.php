<?php get_header() ?>

  <div id="primary" class="container">
    <main id="main" class="error-404 not-found">
      <section class="error-404 not-found">
      <head class="page-header">
        <h1 class="page-title"> Sorry, Page Not Found!</h1>
      </head>
      <div class="page-content">
        <h2>Looks like something is wrong.</h2>
        <?php get_search_form(); ?>
        <?php the_widget('WP_Widget_Recent_Posts'); ?>
        <div class="widget widget-categories">
          <h3>Check the most popular category</h3>
          <ul>
            <?php wp_list_categories(array(
              'order_by' => 'count',
              'order' => 'DESC',
              'show_count' => 1,
              'title_li' => '',
              'number' => 5,
            )) ?>
          </ul>
        </div>
        <?php the_widget('WP_Widget_Archives', 'dropdown=0', "after_title=</h2>"); ?>
      </div>
      </section>
    </main>

  </div>


<?php get_footer() ?>
