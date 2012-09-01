<?php

// Add glossary-term as a new type of post/page, 
// with option to display interface for editing enabled.
function wgGlossary_add_glossary_item_post_type(){

	$customPostTypeName = wgGlossaryCustomPostTypeName;
	$customPostTypeNames = wgGlossaryCustomPostTypeNamePlural;
	$customPostTypeSlug = wgGlossaryCustomPostTypeSlug;
	$customPostTypeRewriteSlug = wgGlossaryCustomPostTypeRewriteSlug;
	
  $labels = array(
    'name' => _x($customPostTypeNames, 'post type general name'),
    'singular_name' => _x($customPostTypeName, 'post type singular name'),
    'add_new' => _x('Add New', 'post type\'s add new text'),
    'add_new_item' => __('Add New ' . $customPostTypeName),
    'edit_item' => __('Edit ' . $customPostTypeName),
    'new_item' => __('New ' . $customPostTypeName),
    'all_items' => __('All ' . $customPostTypeNames),
    'view_item' => __('View ' . $customPostTypeName),
    'search_items' => __('Search ' . $customPostTypeNames),
    'not_found' =>  __('No ' . $customPostTypeNames . ' found'),
    'not_found_in_trash' => __('No ' . $customPostTypeNames . ' found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => $customPostTypeNames
  );
	
	$args = array(
		'labels' => $labels,
		'description' => __('Words or phrases to be described and displayed in glossary format.'),
		'public' => true,
		'show_ui' => true,
		'_builtin' => false,
		'capability_type' => 'page',
		'hierarchical' => false,
		'rewrite' => array('slug' => $customPostTypeRewriteSlug),
		'query_var' => true,
		'menu_position' => 55,
		'supports' => array('title','editor','author','excerpt','trackbacks','comments', 'revisions', 'page-attributes'),
		'taxonomies' => array('category' => 'term-group'));
	register_post_type($customPostTypeSlug,$args);
}

function wgGlossary_add_glossary_term_custom_taxonomy() {
	$customTaxonomyName = wgGlossaryCustomTaxonomyName;
	$customTaxonomyNames = wgGlossaryCustomTaxonomyNamePlural;
	$customTaxonomySlug = wgGlossaryCustomTaxonomySlug;
	$customPostTypeSlug = wgGlossaryCustomPostTypeSlug;
	
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( $customTaxonomyNames, 'taxonomy general name' ),
    'singular_name' => _x( $customTaxonomyName, 'taxonomy singular name' ),
    'search_items' =>  __( 'Search '.$customTaxonomyNames ),
    'all_items' => __( 'All '.$customTaxonomyNames ),
    'parent_item' => __( 'Parent '.$customTaxonomyName ),
    'parent_item_colon' => __( 'Parent '.$customTaxonomyName.':' ),
    'edit_item' => __( 'Edit '.$customTaxonomyName ), 
    'update_item' => __( 'Update '.$customTaxonomyName ),
    'add_new_item' => __( 'Add New '.$customTaxonomyName ),
    'new_item_name' => __( 'New '.$customTaxonomyName.' Name' ),
    'menu_name' => __( $customTaxonomyNames )
  ); 	

  register_taxonomy($customTaxonomySlug,$customPostTypeSlug, array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true
  ));
}

// Icons
function wgGlossary_modify_custom_post_type_icons() {
	$url_path = "/wp-content/plugins/wordgallery-glossary/view";
	$postTypeSlug = wgGlossaryCustomPostTypeSlug;
	echo <<<END
		<style type="text/css" media="screen">
	#icon-edit.icon32-posts-$postTypeSlug, #icon-post.icon32-posts-$postTypeSlug {
		background: url($url_path/image/information-icon-admin-page.png) no-repeat !important;
	}
	#menu-posts-$postTypeSlug .wp-menu-image {
		background: url($url_path/image/information-icon-admin-menu.png) no-repeat 6px -17px !important;
	}
	#menu-posts-$postTypeSlug:hover .wp-menu-image, #menu-posts-$postTypeSlug.wp-has-current-submenu .wp-menu-image {
		background-position:6px 7px!important;
	}
	</style>
END;
}

?>