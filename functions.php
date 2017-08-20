<?php
// include script
function ashraf_script_enqueue(){
  // css files
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all' );
  wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/ashraf.css', array(), 'v-0.001', 'all' );
  // javascript files
  wp_enqueue_script('jquery', true);
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', true);
  wp_enqueue_script('customjs', get_template_directory_uri() . '/js/ashraf.js', array(), 'v-0.001', true);
}
add_action('wp_enqueue_scripts', 'ashraf_script_enqueue');
// activate menus
function ashraf_theme_setup(){
  add_theme_support('menus');
  register_nav_menu('primary', 'Primary Header Navigation');
  register_nav_menu('secondary', 'Footer Navigation');
}
add_action('init', 'ashraf_theme_setup');
// theme support
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside', 'image', 'video'));
add_theme_support('html5', array('search-form'));
// Sidebar function
function ashraf_widget_setup(){
  register_sidebar(
      array(
          'name' => 'Sidebar',
          'id'   => 'sidebar-1',
          'class'=> 'custom',
          'description' => 'Stander Sidebar',
          'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    			'after_widget'  => '</aside>',
    			'before_title'  => '<h1 class="widget-title">',
    			'after_title'   => '</h1>',
      )
    );
};
add_action('widgets_init','ashraf_widget_setup');
// Include Walker Files
require get_template_directory() . '/inc/walker.php';
// Edit header wp version
function ashraf_remove_version() {
  return '';
};
add_filter('the_generator', 'ashraf_remove_version');
// Custom Post tipe
function ashraf_custom_post_type(){
  $labels = array(
    'name' => 'Portfolio',
    'singular_name' => 'Portfolio',
    'add_new' => 'Add Item',
    'all_items' => 'All Items',
    'add_new_item' => 'Add Item',
    'edit_item' => 'Edit Item',
    'view_item' => 'View Item',
    'search_item' => 'Search Portfolio',
    'not_found' => 'No Item Found',
    'not_found_in_trash' => 'No Item Found in Trash',
    'parent_item_colon' => 'Parent Item'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail',
      'revisions',
    ),
    // 'taxonomies' => array('category', 'post_tag'),
    'menu_position' => 5,
    'exclude_form_search' => false,
  );
  register_post_type('portfolio', $args);
}
add_action('init', 'ashraf_custom_post_type');

function ashraf_custom_taxonomies(){
  // add new taxonomy hierarchical
  $labels = array(
    'name' => 'Fields',
    'singular_name' => 'Field',
    'search_item' => 'Search Fields',
    'all_item' => 'All Fields',
    'parent_item' => 'Parent Fields',
    'edit_item' => 'Edit Field',
    'update_item' => 'Update Field',
    'add_new_item' => 'Add New Field',
    'new_item_name' => 'New Field Name',
    'menu_name' => 'Fields',
  );
  $args = array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'rewrite' => array( 'slug' => 'field' ),
  );
  register_taxonomy('field', array('portfolio'), $args);
  // add new taxonomy Not hierarchical]
  register_taxonomy('software', 'portfolio', array(
    'label' => 'Software',
    'rewrite' => array('slug' => 'software'),
    'hierarchical' => false,
  ));

};
add_action('init', 'ashraf_custom_taxonomies');

// Custom Term function
function ashraf_get_terms($postID, $term){
  $tarms_list = wp_get_post_terms($postID, $term);
  $output = '';
  $i = 0;
  foreach($tarms_list as $term) {
    $i++;
    if( $i > 1 ){ $output .= ', ';}
    $output .= '<a href="' . get_term_link( $term ) . '">'. $term->name .'</a>' ;
  }
  return $output;
}
