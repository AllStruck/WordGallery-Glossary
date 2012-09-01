<?php
/* 
	wordgallery-glossary/controller/setup.php
	- Creates main functionality for plugin to work on most websites.
	- Creates definitions for the rest of this plugin.
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


// Set our global prefix to be used throughout the plugin:
define('wgGlossaryPrefix', 'wgGlossary_');
define('wgGlossarySlugPrefix', 'wgGlossary-');
define('wgGlossaryShortPrefix', 'wgg_');


// Set up a bunch of values to use in the wgGlossarySettings:
define('wgGlossarySettingsPageTitle', 'WordGallery Glossary Settings');
define('wgGlossarySettingsPageSlug', wgGlossaryPrefix.'settings_page');
define('wgGlossarySettingsMenuTitle', 'WordGallery Glossary');
define('wgGlossarySettingsMenuCapability', 'edit_plugins');

define('wgGlossarySettingsSectionOneTitle', 'Main Settings');
define('wgGlossarySettingsSectionOneSlug', wgGlossaryPrefix.'settings_section_one');
define('wgGlossarySettingsSectionTwoTitle', 'jQuery Settings');
define('wgGlossarySettingsSectionTwoSlug', wgGlossaryPrefix.'settings_section_two');
define('wgGlossarySettingsSectionThreeTitle', 'Group Settings');
define('wgGlossarySettingsSectionThreeSlug', wgGlossaryPrefix.'settings_section_three');
define('wgGlossarySettingsSectionFourTitle', 'Miscellaneous Settings');
define('wgGlossarySettingsSectionFourSlug', wgGlossaryPrefix.'settings_section_four');
define('wgGlossarySettingsSectionFiveTitle', 'Support WordGallery Glossary');
define('wgGlossarySettingsSectionFiveSlug', wgGlossaryPrefix.'settings_section_five');
define('wgGlossarySettingsSectionSixTitle', 'Deleting');
define('wgGlossarySettingsSectionSixSlug', wgGlossaryPrefix.'settings_section_six');

define('wgGlossarySettingOneTitle', 'Page to Override'); define('wgGlossarySettingOneSlug', wgGlossaryPrefix.'page_to_override'); define('wgGlossarySettingOneSection', wgGlossarySettingsSectionOneSlug);
define('wgGlossarySettingTwoTitle', 'Display Style'); define('wgGlossarySettingTwoSlug', wgGlossaryPrefix.'display_style'); define('wgGlossarySettingTwoSection', wgGlossarySettingsSectionOneSlug);
define('wgGlossarySettingThreeTitle', 'Custom Style CSS'); define('wgGlossarySettingThreeSlug', wgGlossaryPrefix.'custom_style'); define('wgGlossarySettingThreeSection', wgGlossarySettingsSectionOneSlug);
define('wgGlossarySettingFourTitle', 'Use jQuery Animated Folding'); define('wgGlossarySettingFourSlug', wgGlossaryPrefix.'use_jQuery'); define('wgGlossarySettingFourSection', wgGlossarySettingsSectionTwoSlug);
define('wgGlossarySettingFiveTitle', 'Load with Item # X Open'); define('wgGlossarySettingFiveSlug', wgGlossaryPrefix.'jQuery_first_open'); define('wgGlossarySettingFiveSection', wgGlossarySettingsSectionTwoSlug);
define('wgGlossarySettingSixTitle', 'Use Groups Taxonomy'); define('wgGlossarySettingSixSlug', wgGlossaryPrefix.'use_groups_taxonomy'); define('wgGlossarySettingSixSection', wgGlossarySettingsSectionThreeSlug);
define('wgGlossarySettingSevenTitle', 'Show Group Titles'); define('wgGlossarySettingSevenSlug', wgGlossaryPrefix.'show_group_titles'); define('wgGlossarySettingSevenSection', wgGlossarySettingsSectionThreeSlug);
define('wgGlossarySettingEightTitle', 'Show Group Key'); define('wgGlossarySettingEightSlug', wgGlossaryPrefix.'show_group_key'); define('wgGlossarySettingEightSection', wgGlossarySettingsSectionThreeSlug);
define('wgGlossarySettingNineTitle', 'Show Read More Link'); define('wgGlossarySettingNineSlug', wgGlossaryPrefix.'show_read_more_link'); define('wgGlossarySettingNineSection', wgGlossarySettingsSectionFourSlug);
define('wgGlossarySettingTenTitle', 'Read More Link Text'); define('wgGlossarySettingTenSlug', wgGlossaryPrefix.'read_more_text'); define('wgGlossarySettingTenSection', wgGlossarySettingsSectionFourSlug);
define('wgGlossarySettingElevenTitle', 'Ignore Excerpts'); define('wgGlossarySettingElevenSlug', wgGlossaryPrefix.'ignore_excerpts'); define('wgGlossarySettingElevenSection', wgGlossarySettingsSectionFourSlug);
define('wgGlossarySettingTwelveTitle', 'Show Credit Link Under Glossary List'); define('wgGlossarySettingTwelveSlug', wgGlossaryPrefix.'show_credit_link'); define('wgGlossarySettingTwelveSection', wgGlossarySettingsSectionFiveSlug);
define('wgGlossarySettingThirteenTitle', 'Glossary term slug rewrite'); define('wgGlossarySettingThirteenSlug', wgGlossaryPrefix.'rewrite_slug'); define('wgGlossarySettingThirteenSection', wgGlossarySettingsSectionFourSlug);
define('wgGlossarySettingFourteenTitle', 'Delete settings'); define('wgGlossarySettingFourteenSlug', wgGlossaryPrefix.'delete_settings'); define('wgGlossarySettingFourteenSection', wgGlossarySettingsSectionSixSlug);
define('wgGlossarySettingFifteenTitle', 'Delete posts and terms.'); define('wgGlossarySettingFifteenSlug', wgGlossaryPrefix.'delete_posts_and_terms'); define('wgGlossarySettingFifteenSection', wgGlossarySettingsSectionSixSlug);

define('wgGlossarySettingsSectionOneCallbackFunction', wgGlossarySettingsSectionOneSlug.'_content');
define('wgGlossarySettingsSectionTwoCallbackFunction', wgGlossarySettingsSectionTwoSlug.'_content');
define('wgGlossarySettingsSectionThreeCallbackFunction', wgGlossarySettingsSectionThreeSlug.'_content');
define('wgGlossarySettingsSectionFourCallbackFunction', wgGlossarySettingsSectionFourSlug.'_content');
define('wgGlossarySettingsSectionFiveCallbackFunction', wgGlossarySettingsSectionFiveSlug.'_content');
define('wgGlossarySettingsSectionSixCallbackFunction', wgGlossarySettingsSectionSixSlug.'_content');

define('wgGlossarySettingOneCallbackFunction', wgGlossarySettingOneSlug.'_input'); define('wgGlossarySettingOneValidationFunction', wgGlossarySettingOneSlug.'_validate');
define('wgGlossarySettingTwoCallbackFunction', wgGlossarySettingTwoSlug.'_input'); define('wgGlossarySettingTwoValidationFunction', wgGlossarySettingTwoSlug.'_validate');
define('wgGlossarySettingThreeCallbackFunction', wgGlossarySettingThreeSlug.'_input'); define('wgGlossarySettingThreeValidationFunction', wgGlossarySettingThreeSlug.'_validate');
define('wgGlossarySettingFourCallbackFunction', wgGlossarySettingFourSlug.'_input'); define('wgGlossarySettingFourValidationFunction', wgGlossarySettingFourSlug.'_validate');
define('wgGlossarySettingFiveCallbackFunction', wgGlossarySettingFiveSlug.'_input'); define('wgGlossarySettingFiveValidationFunction', wgGlossarySettingFiveSlug.'_validate');
define('wgGlossarySettingSixCallbackFunction', wgGlossarySettingSixSlug.'_input'); define('wgGlossarySettingSixValidationFunction', wgGlossarySettingSixSlug.'_validate');
define('wgGlossarySettingSevenCallbackFunction', wgGlossarySettingSevenSlug.'_input'); define('wgGlossarySettingSevenValidationFunction', wgGlossarySettingSevenSlug.'_validate');
define('wgGlossarySettingEightCallbackFunction', wgGlossarySettingEightSlug.'_input'); define('wgGlossarySettingEightValidationFunction', wgGlossarySettingEightSlug.'_validate');
define('wgGlossarySettingNineCallbackFunction', wgGlossarySettingNineSlug.'_input'); define('wgGlossarySettingNineValidationFunction', wgGlossarySettingNineSlug.'_validate');
define('wgGlossarySettingTenCallbackFunction', wgGlossarySettingTenSlug.'_input'); define('wgGlossarySettingTenValidationFunction', wgGlossarySettingTenSlug.'_validate');
define('wgGlossarySettingElevenCallbackFunction', wgGlossarySettingElevenSlug.'_input'); define('wgGlossarySettingElevenValidationFunction', wgGlossarySettingElevenSlug.'_validate');
define('wgGlossarySettingTwelveCallbackFunction', wgGlossarySettingTwelveSlug.'_input'); define('wgGlossarySettingTwelveValidationFunction', wgGlossarySettingTwelveSlug.'_validate');
define('wgGlossarySettingThirteenCallbackFunction', wgGlossarySettingThirteenSlug.'_input'); define('wgGlossarySettingThirteenValidationFunction', wgGlossarySettingThirteenSlug.'_validate');
define('wgGlossarySettingFourteenCallbackFunction', wgGlossarySettingFourteenSlug.'_input'); define('wgGlossarySettingFourteenValidationFunction', wgGlossarySettingFourteenSlug.'_validate');
define('wgGlossarySettingFifteenCallbackFunction', wgGlossarySettingFifteenSlug.'_input'); define('wgGlossarySettingFifteenValidationFunction', wgGlossarySettingFifteenSlug.'_validate');

// More stuff used by settings:
define('wgGlossarySettingsPageID', wgGlossaryMainFile);

define('initwgGlossarySettingsFunction', wgGlossaryPrefix.'init_settings');
define('addwgGlossarySettingsPageFunction', wgGlossaryPrefix.'add_settings_page');
define('wgGlossarySettingsManagerFunction', wgGlossaryPrefix.'settings_manager');

define('DEFAULT_CSS_STYLE_FILE_LOCATION', WP_PLUGIN_DIR . '/wordgallery-glossary/view/settings-page/default-style.css');


// A bunch of general values for the entire plugin:
define('wgGlossaryCustomPostTypeName', 'Glossary Term');
define('wgGlossaryCustomPostTypeNamePlural', 'Glossary Terms');
define('wgGlossaryCustomPostTypeSlug', wgGlossaryShortPrefix.'glossary_term');
define('wgGlossaryCustomTaxonomyName', 'Group');
define('wgGlossaryCustomTaxonomyNamePlural', 'Groups');
define('wgGlossaryCustomTaxonomySlug', wgGlossarySlugPrefix.'group');
define('wgGlossaryCustomPostTypeRewriteSlug', get_option(wgGlossarySettingThirteenSlug));

// Setting values:
define('wgGlossaryPageToOverride', get_option(wgGlossarySettingOneSlug));
define('wgGlossaryDisplayStyle', get_option(wgGlossarySettingTwoSlug));
define('wgGlossaryCustomStyle', get_option(wgGlossarySettingThreeSlug));
define('wgGlossaryUseJQuery', get_option(wgGlossarySettingFourSlug));
define('wgGlossaryJQueryFirstOpen', get_option(wgGlossarySettingFiveSlug));
define('wgGlossaryUseGroupsTaxonomy', get_option(wgGlossarySettingSixSlug));
define('wgGlossaryShowGroupTitles', get_option(wgGlossarySettingSevenSlug));
define('wgGlossaryShowGroupKey', get_option(wgGlossarySettingEightSlug));
define('wgGlossaryShowReadMoreLink', get_option(wgGlossarySettingNineSlug));
define('wgGlossaryReadMoreText', get_option(wgGlossarySettingTenSlug));
define('wgGlossaryIgnoreExcerpts', get_option(wgGlossarySettingElevenSlug));
define('wgGlossaryShowCreditLink', get_option(wgGlossarySettingTwelveSlug));
define('wgGlossaryRewriteSlug', get_option(wgGlossarySettingThirteenSlug));
