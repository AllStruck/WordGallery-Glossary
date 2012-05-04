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



// Display glossary page
function wgGlossary_display_page($content){
	$glossaryPageID = get_option('wgGlossary_page_to_override');
	if (is_numeric($glossaryPageID) && is_page($glossaryPageID)){
		$glossary_item_index = get_children(array(
											'post_type'		=> 'glossary-term',
											'post_status'	=> 'publish',
											'orderby'		=> 'title',
											'order'			=> 'ASC',
											'post_parent'	=> null,
											));
		if ($glossary_item_index){
			global $ABCMIN;
			global $styleFile;
			$minimumForABCNav = get_option('wgGlossary_alphabet_navigation_minimum');
			$ABCNavToggle = get_option('wgGlossary_alphabet_navigation_toggle');
			if (count($glossary_item_index) >= $ABCMIN && $ABCNavToggle == 1) {
				$alphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
				$alphabetSoup .= '<center style="text-align:center;font-size:xx-large;margin:20px;">';
				foreach ($alphabet as $letter) {
					$alphabetSoup .= '<a href="#'.$letter.'">'. strtoupper($letter) . '</a> ';
				}
				$alphabetSoup .= '</center>';
			}
			
						
			$content .= '<div id="wgGlossaryItemList">';
			$excerptIgnore = get_option('wgGlossary_ignore_excerpt');
			foreach($glossary_item_index as $item){
				global $excerptIgnore;
				$content .= '<div class="wgGlossaryItemWrapper"><h4 class="wgGlossaryItemTitle"><a href="' . get_permalink($item) . '">' . $item->post_title . '</a></h4>';
				$content .= '<div class="wgGlossaryItemDefinition">';
				if ((($item->post_excerpt == "") || (get_option('wgGlossary_ignore_excerpt') == 1))) {
					$content .= $item->post_content;
					//$content = $content . '<a href="'. get_permalink($item) .'">'. get_option('wgGlossary_read_more_text') .'</a>';
				} else {
					$content .= $item->post_excerpt;
				}
				$readMoreLink = ' <br/> <a class="wgGlossaryItemReadMoreLink" style="float:right;" href="' . get_permalink($item) . '">' . get_option('wgGlossary_read_more_text').'</a>';
				if (get_option('wgGlossary_show_read_more_link') == 1) { 	
					$content .= $readMoreLink;
				}
					$content .= "</div></div>";
			}
			if (get_option('wgGlossary_show_credit_link')) {
				$content .= '<div class="wgGlossaryCreditLink" style="text-align:center; margin:2em !important; clear:both;">Glossary created using <a href="http://wordgallery-glossary.allstruck.net">WordGallery Glossary</a></div>';
			}
			$content .= '</div>';
		}
	}
	
	return $content;
}

if (get_option("wgGlossary_use_jQuery") == 1) {
	add_action('wp_head', 'wgg_jquery_folding_script', 999);
}


function wgg_jquery_folding_script() {
				extract($GLOBALS);
				$pluginURL = $wp_plugin_url;
				
				global $content;
				$content .= '
	<script type="text/javascript">
	/* WordGallery Glossary jQuery animated folding script */
	/* <![CDATA[ */
		jQuery.noConflict();
		(function($) {
			function initialGlossaryItemAnimation() {';
									if (get_option('wgGlossary_jQuery_first_open') > 0) {			
						$content .=	'
					$(".wgGlossaryItemWrapper h4").eq('. (get_option("wgGlossary_jQuery_first_open") - 1) .').addClass("active");
					$(".wgGlossaryItemWrapper h4.active").next("div.wgGlossaryItemDefinition").slideToggle();
					$(".wgGlossaryItemWrapper h4").next("div.wgGlossaryItemDefinition").slideToggle();
					';
								} else {
						$content .=	'
					$(".wgGlossaryItemWrapper h4").next("div.wgGlossaryItemDefinition").slideToggle();';
								}
					$content .= '
			};';
			$content .= '
			$(function() {';
		
					$content .=	'
							$("body").ajaxComplete(function() { initialGlossaryItemAnimation(); });

				initialGlossaryItemAnimation();
					
				$(".wgGlossaryItemWrapper h4").live("click", function() {
					if ($(this).hasClass("active")) {
						$(this).next("div.wgGlossaryItemDefinition:visible").slideUp("fast");
						$(this).toggleClass("active");
						$(this).removeClass("active");
					} else {
						$(this).next("div.wgGlossaryItemDefinition").slideToggle("slow");
						$("h4.active").next("div.wgGlossaryItemDefinition:visible").slideUp("fast");
						$("h4.active").removeClass("active");
						$(this).toggleClass("active");
						$(this).siblings("h4").removeClass("active");
					}
				return false;
				});
			});
		})(jQuery);
	/* ]]> */
	</script>
';	echo $content;
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