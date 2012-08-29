<?php

// Add glossary-term as a new type of post/page, 
// with option to display interface for editing enabled.
function add_glossary_item_post_type(){
	$glossaryPermalink = get_option('wgGlossary_url_slug');
	
	$customPostTypeName = get_option('wgGlossary_custom_post_type_name');
	$customPostTypeNamePlural = get_option('wgGlossary_custom_post_type_name_plural');
	$customPostTypeNameSlug = get_option('wgGlossary_custom_post_type_name_slug');
	
	
  $labels = array(
    'name' => _x($customPostTypeNamePlural
	, 'post type general name'),
    'singular_name' => _x($customPostTypeName
	, 'post type singular name'),
    'add_new' => _x('Add New', 'post type\'s add new text'),
    'add_new_item' => __('Add New ' . $customPostTypeName),
    'edit_item' => __('Edit ' . $customPostTypeName),
    'new_item' => __('New ' . $customPostTypeName),
    'all_items' => __('All ' . $customPostTypeNamePlural),
    'view_item' => __('View ' . $customPostTypeName),
    'search_items' => __('Search ' . $customPostTypeNamePlural),
    'not_found' =>  __("No $customPostTypeNamePlural found"),
    'not_found_in_trash' => __("No $customPostTypeNamePlural found in Trash"), 
    'parent_item_colon' => '',
    'menu_name' => $customPostTypeNamePlural
  );
	
	$args = array(
		'labels' => $labels,
		'description' => 'Words or phrases to be described and displayed in glossary format on one page.',
		'public' => true,
		'show_ui' => true,
		'_builtin' => false,
		'capability_type' => 'page',
		'hierarchical' => false,
		'rewrite' => array('slug' => $customPostTypeNameSlug),
		'query_var' => true,
		'menu_position' => 55,
		'supports' => array('title','editor','author','excerpt','trackbacks','comments', 'revisions', 'page-attributes'),
		'taxonomies' => array('category' => 'term-group'));
	register_post_type('glossary-term',$args);
}

function add_glossary_term_custom_taxonomy() {
	$customTaxonomyName = get_option('wgGlossary_custom_taxonomy_name');
	$customTaxonomyNamePlural = get_option('wgGlossary_custom_taxonomy_name_plural');
	$customTaxonomyNameSlug = get_option('wgGlossary_custom_taxonomy_name_slug');

  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( $customTaxonomyNamePlural, 'taxonomy general name' ),
    'singular_name' => _x( $customTaxonomyName, 'taxonomy singular name' ),
    'search_items' =>  __( "Search $customTaxonomyNamePlural" ),
    'all_items' => __( "All $customTaxonomyNamePlural" ),
    'parent_item' => __( "Parent $customTaxonomyName" ),
    'parent_item_colon' => __( "Parent $customTaxonomyName:" ),
    'edit_item' => __( "Edit $customTaxonomyName" ), 
    'update_item' => __( "Update $customTaxonomyName" ),
    'add_new_item' => __( "Add New $customTaxonomyName" ),
    'new_item_name' => __( "New $customTaxonomyName Name" ),
    'menu_name' => __( $customTaxonomyNamePlural ),
  ); 	

  register_taxonomy('glossary-term-group','glossary-term', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
  ));
}

// Icons
function modify_custom_post_type_icons() {
	$url_path = "/wp-content/plugins/wordgallery-glossary/view";
	echo <<<END
		<style type="text/css" media="screen">
	#icon-edit.icon32-posts-glossary-term, #icon-post.icon32-posts-glossary-term {
		background: url($url_path/image/information-icon-admin-page.png) no-repeat !important;
	}
	#menu-posts-glossary-term .wp-menu-image {
		background: url($url_path/image/information-icon-admin-menu.png) no-repeat 6px -17px !important;
	}
	#menu-posts-glossary-term:hover .wp-menu-image, #menu-posts-glossary-term.wp-has-current-submenu .wp-menu-image {
		background-position:6px 7px!important;
	}
	</style>
END;
}

?>