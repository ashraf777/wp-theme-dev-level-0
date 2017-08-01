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

add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside', 'image', 'video'));

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
