<?php

  /* 
    Plugin Name: Gym Fitness - Location
    Plugin URI:
    Description: Creates a shortcode that displays map
    Version: 1.0
    Author: Joshua Winterbottom
    Author: URI:
    Text Domain: gymfitness
  
  */

  if(!defined('ABSPATH')) die();


  // Shortcode API
  function gymfitness_location_shortcode(){ 
    
    $location = get_field('location');

  ?>

    <div class="location">

      <input type="hidden" id="lat" value="<?php echo $location['lat']; ?>">
      <input type="hidden" id="lng" value="<?php echo $location['lng']; ?>">
      <input type="hidden" id="address" value="<?php echo $location['address']; ?>">

      <div id="map"></div>
      

    </div>

<?php
  }
  add_shortcode('gymfitness_location', 'gymfitness_location_shortcode');
  // [gymfitness_location]

  // Enqueue the CSS and JS fIles
  function gymfitness_location_scripts(){

    if(is_page('contact-us')):

      // Leaflet CSS
      wp_enqueue_style('leafletcss', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css', array(), '1.7.1');


      // Leaflet JS FILES
      wp_enqueue_script('leafletjs', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js', array(), '1.7.1', true);

      // Gymfitness Leaflet JS FILES
      wp_enqueue_script('gymfitness-leaflet', plugins_url('/js/gymfitness-leaflet.js', __FILE__), array('leafletjs'), '1.0', true);

    endif;

  }
  add_action('wp_enqueue_scripts', 'gymfitness_location_scripts');

?>
