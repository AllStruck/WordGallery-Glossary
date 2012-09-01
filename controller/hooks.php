<?php

	
	
	// Internationalization:
	add_action( 'init', 'load_language');
	
	// Custom post type and custom taxonomy:
	add_action( 'init', 'wgGlossary_add_glossary_item_post_type');
	add_action( 'init', 'wgGlossary_add_glossary_term_custom_taxonomy');
	add_action( 'admin_head', 'wgGlossary_modify_custom_post_type_icons');
	
	// Load jQuery if option is enabled:
	if (get_option("wgGlossary_use_jQuery") == 1) {
		add_action('wp_head', 'wgg_jquery_folding_script', 999);
	}
	
	// Adds jQuery folding script to front-end (this function handles checking the option itself):
	add_action( 'wp_enqueue_scripts', 'wgg_add_jquery_to_frontend');
	
	// Show the glossary page (this is just for overriding the page specified in settings):
	add_filter('the_content', 'wgGlossary_glossary_terms_page_override');
	
	// Add shortcode that displays glossary of terms anywhere:
	add_shortcode( 'wordgallery', 'wgGlossary_glossary_terms_shortcode' );
	
	//add_action('admin_menu', 'wg_glossary_menu');

	add_action('init', 'wgg_add_stylesheets_to_frontend');

	// register WGGlossaryWidget widget
	add_action('widgets_init', create_function('', 'return register_widget("WGGlossaryWidget");'));

	// Alert Admin in case settings are not configured
	add_action('admin_notices', 'admin_notices');

	add_filter( 'plugin_action_links', 'wg_add_action_link', 10, 2 );
	
	register_activation_hook(wgGlossaryMainFile, 'wgGlossary_activate_plugin' );
	//register_activation_hook(__FILE__, 'plugin_activation');
?>