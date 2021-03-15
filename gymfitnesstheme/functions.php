<?php

// QUERIES FUNCTION
// Link to Queries file

require get_template_directory() . '/inc/queries.php';


// **********************************




// MENU FUNCTION 
// A function to create a menu in the header section of the website

function gymfitness_menus(){

  // WordPress Function
  register_nav_menus( array(
    'main-menu' => 'Main Menu'
  ));

}

// Hook
add_action('init', 'gymfitness_menus');

// **********************************



// JS and CSS FUNCTION
// Function to add CSS and JS files to the website

function gymfitness_scripts(){

  /* LOAD CSS FILES
  --------------------- */ 

  // Normalize CSS
  wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

  // Google font
  wp_enqueue_style('googlefont', 'https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@400;700;900&family=Staatliches&display=swap', array(), '1.0.0' );

  // SlickNav CSS
  wp_enqueue_style('slicknavcss', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.10');

  // Lightbox CSS
  if( basename(get_page_template()) === 'gallery.php'): 
    wp_enqueue_style('lightboxcss', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.1.11');
  endif;

  // BX Slider CSS
  if(is_front_Page()):
    wp_enqueue_style('bxslidercss', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12');
  endif;

  // Main stylesheet
  wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'googlefont', 'slicknavcss'), '1.0.0' );


  /* LOAD JS FILES 
  -------------------------------- */
  
  // Jquery
  wp_enqueue_script('jquery'); 

  // SlickNav JS
  wp_enqueue_script('slicknavjs', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);

  // Lightbox JS
  if( basename(get_page_template()) === 'gallery.php'): 
    wp_enqueue_script('lightboxjs', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.1.11', true);
  endif;

  // BX Slider JS
  if(is_front_Page()):
    wp_enqueue_script('bxsliderjs', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
  endif;

  // Main JS file
  wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true);

}

// Hook
add_action('wp_enqueue_scripts', 'gymfitness_scripts');


// **************************************


// Enable feature images and other stuff

function gymfitness_setup(){

  // Register new image size
  add_image_size('square', 350, 350, true);
  add_image_size('portrait', 350, 724, true);
  add_image_size('box', 400, 375, true);
  add_image_size('mediumSize', 700, 400, true);
  add_image_size('blog', 966, 644, true);

  // add feature image
  add_theme_support('post-thumbnails');

  // SEO titles
  add_theme_support('title-tag');

}

// when the theme is activated and ready
add_action('after_setup_theme', 'gymfitness_setup');



// Creates a Widget Zone
function gymfitness_widgets(){

  register_sidebar( array(
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>', 
    'before_title' => '<h3 class="text-primary">',
    'after_title' => '</h3>'
  ) );

}

add_action('widgets_init', 'gymfitness_widgets');


/* Displays the hero image on the front page */

function gymfitness_hero_image(){

  $front_page_id = get_option('page_on_front');
  $image_id = get_field('hero_image', $front_page_id);
  $image = $image_id['url'];

  // Create a "FALSE" stylesheet
  wp_register_style('custom', false);
  wp_enqueue_style('custom');

  $featured_image_css = "
  
    body.home .site-header{
      background-image: linear-gradient( rgba(0,0,0, 0.75), rgba(0,0,0, 0.75)), url( $image );
      background-size: cover;
      background-position: center;
    }
  
  ";
  wp_add_inline_style('custom', $featured_image_css);

}
add_action('init', 'gymfitness_hero_image');

?>