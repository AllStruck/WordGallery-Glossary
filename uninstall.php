<?php
/* WordPress will run this if the plugin is "deleted". 
 * So here we will remove all options we added during init.
 */
define('wgGlossaryPrefix', 'wgGlossary_');
define('wgGlossarySlugPrefix', 'wgGlossary-');
define('wgGlossaryShortPrefix', 'wgg_');

define('wgGlossarySettingFourteenSlug', wgGlossaryPrefix.'delete_settings');
define('wgGlossarySettingFifteenSlug', wgGlossaryPrefix.'delete_posts_and_terms');

if (get_option(wgGlossarySettingFourteenSlug)) { // Delete settings
	// Need to redefine our slugs since WordPress removes our files before running uninstall.php:
	define('wgGlossarySettingOneSlug', wgGlossaryPrefix.'page_to_override');
	define('wgGlossarySettingTwoSlug', wgGlossaryPrefix.'display_style');
	define('wgGlossarySettingThreeSlug', wgGlossaryPrefix.'custom_style');
	define('wgGlossarySettingFourSlug', wgGlossaryPrefix.'use_jQuery');
	define('wgGlossarySettingFiveSlug', wgGlossaryPrefix.'jQuery_first_open');
	define('wgGlossarySettingSixSlug', wgGlossaryPrefix.'use_groups_taxonomy');
	define('wgGlossarySettingSevenSlug', wgGlossaryPrefix.'show_group_titles');
	define('wgGlossarySettingEightSlug', wgGlossaryPrefix.'show_group_key');
	define('wgGlossarySettingNineSlug', wgGlossaryPrefix.'show_read_more_link');
	define('wgGlossarySettingTenSlug', wgGlossaryPrefix.'read_more_text');
	define('wgGlossarySettingElevenSlug', wgGlossaryPrefix.'ignore_excerpts');
	define('wgGlossarySettingTwelveSlug', wgGlossaryPrefix.'show_credit_link');
	define('wgGlossarySettingThirteenSlug', wgGlossaryPrefix.'rewrite_slug');
	
		// Delete our settings:
		delete_option(wgGlossarySettingOneSlug);
		delete_option(wgGlossarySettingTwoSlug); 
		delete_option(wgGlossarySettingThreeSlug);
		delete_option(wgGlossarySettingFourSlug);
		delete_option(wgGlossarySettingFiveSlug);
		delete_option(wgGlossarySettingSixSlug);
		delete_option(wgGlossarySettingSevenSlug);
		delete_option(wgGlossarySettingEightSlug);
		delete_option(wgGlossarySettingNineSlug);
		delete_option(wgGlossarySettingTenSlug);
		delete_option(wgGlossarySettingElevenSlug);
		delete_option(wgGlossarySettingTwelveSlug);
		delete_option(wgGlossarySettingThirteenSlug);
		delete_option(wgGlossarySettingFourteenSlug);
		delete_option(wgGlossarySettingFifteenSlug);

		// Old stuff, should be deleted in future hopefully:
		delete_option('wgGlossary_fullname');
		delete_option('wgGlossary_name');
		delete_option('wgGlossary_version');
		delete_option('wgGlossary_url_slug');
		delete_option('wgGlossary_url_slug_long');
		delete_option('wgGlossary_items_security_level');
		delete_option('wgGlossary_displayPageID');
		
		delete_option('wgGlossary_ignore_excerpt');
		delete_option('wgGlossary_show_read_more_link');
		delete_option('wgGlossary_read_more_text');
		delete_option('wgGlossary_use_jQuery');
		
		delete_option('wgGlossary_custom_post_type_name');
		delete_option('wgGlossary_custom_post_type_name_plural');
		delete_option('wgGlossary_custom_post_type_name_slug');
		delete_option('wgGlossary_custom_taxonomy_name');
		delete_option('wgGlossary_custom_taxonomy_name_plural');
		delete_option('wgGlossary_custom_taxonomy_slug');
}

if (get_option(wgGlossarySettingFifteenSlug)) { // Delete custom posts and terms
	define('wgGlossaryCustomPostTypeSlug', wgGlossaryShortPrefix.'glossary_term');
	define('wgGlossaryCustomTaxonomySlug', wgGlossarySlugPrefix.'group');

	$posts = get_pages(array('post_type' => wgGlossaryCustomPostTypeSlug));
	$terms = get_terms(wgGlossaryCustomTaxonomySlug, array('hide_empty' => 0));
	
	foreach($posts as $post) {
		wp_delete_post($post->ID, TRUE);
	}
	
	foreach($terms as $term) {
		wp_delete_term($term->ID, wgGlossaryCustomTaxonomySlug);
	}
}
	
	
