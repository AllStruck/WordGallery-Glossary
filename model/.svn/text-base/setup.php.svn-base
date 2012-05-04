<?php
/* 
	wordgallery-glossary/controller/setup.php
	- Creates main functionality for plugin to work on most websites.
*/

if ( ! function_exists( 'is_ssl' ) ) {
 function is_ssl() {
  if ( isset($_SERVER['HTTPS']) ) {
   if ( 'on' == strtolower($_SERVER['HTTPS']) )
    return true;
   if ( '1' == $_SERVER['HTTPS'] )
    return true;
  } elseif ( isset($_SERVER['SERVER_PORT']) && ( '443' == $_SERVER['SERVER_PORT'] ) ) {
   return true;
  }
  return false;
 }
}

if ( version_compare( get_bloginfo( 'version' ) , '3.0' , '<' ) && is_ssl() ) {
 $wp_content_url = str_replace( 'http://' , 'https://' , get_option( 'siteurl' ) );
} else {
 $wp_content_url = get_option( 'siteurl' );
}

$wp_content_url .= '/wp-content';
$wp_content_dir = ABSPATH . 'wp-content';
$wp_plugin_url = $wp_content_url . '/plugins';
$wp_plugin_dir = $wp_content_dir . '/plugins';
$wpmu_plugin_url = $wp_content_url . '/mu-plugins';
$wpmu_plugin_dir = $wp_content_dir . '/mu-plugins';

include 'functions.php';