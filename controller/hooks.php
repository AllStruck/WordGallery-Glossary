<?php

	
	if (get_option("wgGlossary_use_jQuery") == 1) {
		add_action('wp_head', 'wgg_jquery_folding_script', 999);
	}


	add_action( 'init', 'load_language');
	
	add_action( 'init', 'add_glossary_item_post_type');
	add_action( 'init', 'add_glossary_term_custom_taxonomy');
	
	add_action( 'admin_head', 'modify_custom_post_type_icons');

	add_action( 'wp_enqueue_scripts', 'wgg_add_jquery_to_frontend');
	
	add_filter('the_content', 'wgGlossary_display_page');

	//add_action('admin_menu', 'wg_glossary_menu');

	add_action('init', 'wgg_add_stylesheets_to_frontend');

	// register WGGlossaryWidget widget
	add_action('widgets_init', create_function('', 'return register_widget("WGGlossaryWidget");'));

	// Alert Admin in case settings are not configured
	add_action('admin_notices', 'admin_notices');

	add_filter( 'plugin_action_links', 'wg_add_action_link', 10, 2 );
	
	register_activation_hook(__FILE__, 'plugin_activation');
?>