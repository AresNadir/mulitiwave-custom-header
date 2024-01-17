<?php
/**
 * Plugin Name: Multivwave custom header shortcode
 * Description: Loads the header of the site.
 * Version: 1.0
 * Author: Eproductions.
 * Author URI: https://eproductions.gr
 */

 function multiwave_custom_header() {

  $theLogo = et_get_option( 'divi_logo' );
  $multiWave = '
  <div class="multiwave-mobile_menu_container">
    <div class="mw-mobile_menu">
      <nav>';
        ob_start();
        wp_nav_menu( array( 'menu' => 'MultyWaveMenu', 'container' => false ) );
        $multiWave .= ob_get_clean();
        $multiWave .= '
      </nav>
    </div>
    <div class="mw-mobile_menu_mail">
      <a href="mailto:info@multiwave.ch">info@multiwave.ch</a>
    </div>
  </div>
  <div class="multi-header-row" id="">
    <div class="multi-header-container">
      <div class="multi-header-logo">
        <a href="/">
          <img src="'.$theLogo.'">
        </a>
      </div>
      <div class="multi-header-menu_container">
        <div class="mw-menu">
          <nav>';
            ob_start();
            wp_nav_menu( array( 'menu' => 'MultyWaveMenu', 'container' => false ) );
            $multiWave .= ob_get_clean();
            $multiWave .= '
          </nav>
        </div>
        <div class="mw-mobile-menu_container">
          <div class="mw-menu-trigger">
            <div></div>
            <div></div>
          </div>      
        </div>
      </div>
    </div>
  </div>

  ';
  
  return $multiWave;
}

add_shortcode('multiwave-header', 'multiwave_custom_header');


function multiwave_enqueue_styles() {
  wp_enqueue_style( 'multiwave-style', plugins_url( 'css/styles.css', __FILE__ ) );
  wp_enqueue_script( 'multiwave-header-scroll', plugins_url( 'js/header-scroll.js', __FILE__ ), array(), false, true );
}

add_action( 'wp_enqueue_scripts', 'multiwave_enqueue_styles' );