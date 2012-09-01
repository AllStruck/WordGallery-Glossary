<?php
/* 
	wordgallery-glossary/controller/options.php
	- Creates the basic options for the plugin.
*/

function wgGlossary_create_options() {
	add_option(wgGlossarySettingOneSlug, 'disabled'); // Page to override.
	add_option(wgGlossarySettingTwoSlug, 'Papercut-Avoided.css'); // Display Style.
	add_option(wgGlossarySettingThreeSlug, file_get_contents(DEFAULT_CSS_STYLE_FILE_LOCATION)); // Default Custom Style CSS.
	add_option(wgGlossarySettingFourSlug, 1); // Use jQuery.
	add_option(wgGlossarySettingNineSlug, 1); // Enable read more link.
	add_option(wgGlossarySettingTenSlug, 'Read more…'); // Read more link text.
	add_option(wgGlossarySettingThirteenSlug, 'glossary-term'); // Glossary term rewrite slug.
	add_option(wgGlossarySettingFourteenSlug, 1); // Delete settings on plugin deletion.
	add_option(wgGlossarySettingFifteenSlug, 1); // Delete custom posts and terms on plugin deletion.
	



	add_option('wgGlossary_fullname', 'WordGallery Glossary');
	add_option('wgGlossary_name', 'WG Glossary');
	add_option('wgGlossary_version', '0.7');
	add_option('wgGlossary_url_slug', 'wg-glossary');
	add_option('wgGlossary_url_slug_long', 'wordgallery-glossary');
	add_option('wgGlossary_items_security_level', 'Editor');
	add_option('wgGlossary_displayPageID', 0);
	
	add_option('wgGlossary_ignore_excerpt', 1);
	add_option('wgGlossary_show_read_more_link', 0);
	add_option('wgGlossary_read_more_text', 'Read more...');
	add_option('wgGlossary_use_jQuery', 0);
	
	// Custom post type names
	add_option('wgGlossary_custom_post_type_name', 'Glossary Term');
	add_option('wgGlossary_custom_post_type_name_plural', 'Glossary Terms');
	add_option('wgGlossary_custom_post_type_name_slug', 'glossary-term');
	add_option('wgGlossary_custom_taxonomy_name', 'Group');
	add_option('wgGlossary_custom_taxonomy_name_plural', 'Groups');
	add_option('wgGlossary_custom_taxonomy_slug', 'group');
	
	//update_option('wgGlossary_custom_post_type_name', 'FAQ');
	//update_option('wgGlossary_custom_post_type_name_plural', 'FAQs');
	//update_option('wgGlossary_custom_post_type_name_slug', 'faq');
	update_option('wgGlossary_custom_post_type_name', 'Glossary Term');
	update_option('wgGlossary_custom_post_type_name_plural', 'Glossary Terms');
	update_option('wgGlossary_custom_post_type_name_slug', 'glossary-term');
}