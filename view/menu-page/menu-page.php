<?php


// Set up a bunch of values to use in the settings:
define('prefix', 'wgGlossary_');
define('settingsPageTitle', 'WordGallery Glossary Settings');
define('settingsPageSlug', prefix.'settings_page');
define('settingsMenuTitle', 'WordGallery Glossary');
define('settingsMenuCapability', 'edit_plugins');

define('settingsSectionOneTitle', 'Main Settings');
define('settingsSectionOneSlug', prefix.'settings_section_one');
define('settingsSectionTwoTitle', 'jQuery Settings');
define('settingsSectionTwoSlug', prefix.'settings_section_two');
define('settingsSectionThreeTitle', 'Group Settings');
define('settingsSectionThreeSlug', prefix.'settings_section_three');
define('settingsSectionFourTitle', 'Miscellaneous Settings');
define('settingsSectionFourSlug', prefix.'settings_section_four');
define('settingsSectionFiveTitle', 'Support WordGallery Glossary');
define('settingsSectionFiveSlug', prefix.'settings_section_five');

define('settingOneTitle', 'Page to Override'); define('settingOneSlug', prefix.'page_to_override'); define('settingOneSection', settingsSectionOneSlug);
define('settingTwoTitle', 'Display Style'); define('settingTwoSlug', prefix.'display_style'); define('settingTwoSection', settingsSectionOneSlug);
define('settingThreeTitle', 'Custom Style CSS'); define('settingThreeSlug', prefix.'custom_style'); define('settingThreeSection', settingsSectionOneSlug);
define('settingFourTitle', 'Use jQuery Animated Folding'); define('settingFourSlug', prefix.'use_jQuery'); define('settingFourSection', settingsSectionTwoSlug);
define('settingFiveTitle', 'Load with Item # X Open'); define('settingFiveSlug', prefix.'jQuery_first_open'); define('settingFiveSection', settingsSectionTwoSlug);
define('settingSixTitle', 'Use Groups Taxonomy'); define('settingSixSlug', prefix.'use_groups_taxonomy'); define('settingSixSection', settingsSectionThreeSlug);
define('settingSevenTitle', 'Show Group Titles'); define('settingSevenSlug', prefix.'show_group_titles'); define('settingSevenSection', settingsSectionThreeSlug);
define('settingEightTitle', 'Show Group Key'); define('settingEightSlug', prefix.'show_group_key'); define('settingEightSection', settingsSectionThreeSlug);
define('settingNineTitle', 'Show Read More Link'); define('settingNineSlug', prefix.'show_read_more_link'); define('settingNineSection', settingsSectionFourSlug);
define('settingTenTitle', 'Read More Link Text'); define('settingTenSlug', prefix.'read_more_text'); define('settingTenSection', settingsSectionFourSlug);
define('settingElevenTitle', 'Ignore Excerpts'); define('settingElevenSlug', prefix.'ignore_excerpts'); define('settingElevenSection', settingsSectionFourSlug);
define('settingTwelveTitle', 'Show Credit Link Under Glossary List'); define('settingTwelveSlug', prefix.'show_credit_link'); define('settingTwelveSection', settingsSectionFiveSlug);


define('settingsSectionOneCallbackFunction', settingsSectionOneSlug.'_content');
define('settingsSectionTwoCallbackFunction', settingsSectionTwoSlug.'_content');
define('settingsSectionThreeCallbackFunction', settingsSectionThreeSlug.'_content');
define('settingsSectionFourCallbackFunction', settingsSectionFourSlug.'_content');
define('settingsSectionFiveCallbackFunction', settingsSectionFiveSlug.'_content');

define('settingOneCallbackFunction', settingOneSlug.'_input'); define('settingOneValidationFunction', settingOneSlug.'_validate');
define('settingTwoCallbackFunction', settingTwoSlug.'_input'); define('settingTwoValidationFunction', settingTwoSlug.'_validate');
define('settingThreeCallbackFunction', settingThreeSlug.'_input'); define('settingThreeValidationFunction', settingThreeSlug.'_validate');
define('settingFourCallbackFunction', settingFourSlug.'_input'); define('settingFourValidationFunction', settingFourSlug.'_validate');
define('settingFiveCallbackFunction', settingFiveSlug.'_input'); define('settingFiveValidationFunction', settingFiveSlug.'_validate');
define('settingSixCallbackFunction', settingSixSlug.'_input'); define('settingSixValidationFunction', settingSixSlug.'_validate');
define('settingSevenCallbackFunction', settingSevenSlug.'_input'); define('settingSevenValidationFunction', settingSevenSlug.'_validate');
define('settingEightCallbackFunction', settingEightSlug.'_input'); define('settingEightValidationFunction', settingEightSlug.'_validate');
define('settingNineCallbackFunction', settingNineSlug.'_input'); define('settingNineValidationFunction', settingNineSlug.'_validate');
define('settingTenCallbackFunction', settingTenSlug.'_input'); define('settingTenValidationFunction', settingTenSlug.'_validate');
define('settingElevenCallbackFunction', settingElevenSlug.'_input'); define('settingElevenValidationFunction', settingElevenSlug.'_validate');
define('settingTwelveCallbackFunction', settingTwelveSlug.'_input'); define('settingTwelveValidationFunction', settingTwelveSlug.'_validate');

define('settingsPageID', __FILE__);

define('initSettingsFunction', prefix.'init_settings');
define('addSettingsPageFunction', prefix.'add_settings_page');
define('settingsManagerFunction', prefix.'settings_manager');

// Create a function for initializing our new settings:
function wgGlossary_init_settings() {	
	
	// Settings section:
	// Multiple settings can go into this section after we set it up.
	// We are going to add three settings into this one section.
		add_settings_section(settingsSectionOneSlug, settingsSectionOneTitle, 
			settingsSectionOneCallbackFunction, settingsPageID);
		add_settings_section(settingsSectionTwoSlug, settingsSectionTwoTitle, 
			settingsSectionTwoCallbackFunction, settingsPageID);
		add_settings_section(settingsSectionThreeSlug, settingsSectionThreeTitle, 
			settingsSectionThreeCallbackFunction, settingsPageID);
		add_settings_section(settingsSectionFourSlug, settingsSectionFourTitle, 
			settingsSectionFourCallbackFunction, settingsPageID);
		add_settings_section(settingsSectionFiveSlug, settingsSectionFiveTitle, 
			settingsSectionFiveCallbackFunction, settingsPageID);
	
	// Settings field:
	// We add settings fields to our settings section:
		add_settings_field(settingOneSlug, settingOneTitle, settingOneCallbackFunction, 
			settingsPageID, settingOneSection, array( 'label_for' => settingOneSlug ));
		add_settings_field(settingTwoSlug, settingTwoTitle, settingTwoCallbackFunction, 
			settingsPageID, settingTwoSection, array( 'label_for' => settingTwoSlug ));
		add_settings_field(settingThreeSlug, settingThreeTitle, settingThreeCallbackFunction, 
			settingsPageID, settingThreeSection, array( 'label_for' => settingThreeSlug ));
		add_settings_field(settingFourSlug, settingFourTitle, settingFourCallbackFunction, 
			settingsPageID, settingFourSection, array( 'label_for' => settingFourSlug ));
		add_settings_field(settingFiveSlug, settingFiveTitle, settingFiveCallbackFunction, 
			settingsPageID, settingFiveSection, array( 'label_for' => settingFiveSlug ));
		add_settings_field(settingSixSlug, settingSixTitle, settingSixCallbackFunction, 
			settingsPageID, settingSixSection, array( 'label_for' => settingSixSlug ));
		add_settings_field(settingSevenSlug, settingSevenTitle, settingSevenCallbackFunction, 
			settingsPageID, settingSevenSection, array( 'label_for' => settingSevenSlug ));
		add_settings_field(settingEightSlug, settingEightTitle, settingEightCallbackFunction, 
			settingsPageID, settingEightSection, array( 'label_for' => settingEightSlug ));
		add_settings_field(settingNineSlug, settingNineTitle, settingNineCallbackFunction, 
			settingsPageID, settingNineSection, array( 'label_for' => settingNineSlug ));
		add_settings_field(settingTenSlug, settingTenTitle, settingTenCallbackFunction, 
			settingsPageID, settingTenSection, array( 'label_for' => settingTenSlug ));
		add_settings_field(settingElevenSlug, settingElevenTitle, settingElevenCallbackFunction, 
			settingsPageID, settingElevenSection, array( 'label_for' => settingElevenSlug ));
		add_settings_field(settingTwelveSlug, settingTwelveTitle, settingTwelveCallbackFunction, 
			settingsPageID, settingTwelveSection, array( 'label_for' => settingTwelveSlug ));
	
	// Setting:
	// Now we register our settings:
		register_setting(settingsPageID, settingOneSlug, settingOneValidationFunction);
		register_setting(settingsPageID, settingTwoSlug, settingTwoValidationFunction);
		register_setting(settingsPageID, settingThreeSlug, settingThreeValidationFunction);
		register_setting(settingsPageID, settingFourSlug, settingFourValidationFunction);
		register_setting(settingsPageID, settingFiveSlug, settingFiveValidationFunction);
		register_setting(settingsPageID, settingSixSlug, settingSixValidationFunction);
		register_setting(settingsPageID, settingSevenSlug, settingSevenValidationFunction);
		register_setting(settingsPageID, settingEightSlug, settingEightValidationFunction);
		register_setting(settingsPageID, settingNineSlug, settingNineValidationFunction);
		register_setting(settingsPageID, settingTenSlug, settingTenValidationFunction);
		register_setting(settingsPageID, settingElevenSlug, settingElevenValidationFunction);
		register_setting(settingsPageID, settingTwelveSlug, settingTwelveValidationFunction);
}
// Now call this function in the admin_init action hook:
// This makes sure our settigns are added to WordPress early enough in the loading process:
add_action('admin_init', initSettingsFunction);



// == Settings section functions:
function wgGlossary_settings_section_one_content() {
	echo '<p>';
	_e('These main settings are required.');
	echo '</p>';
}
function wgGlossary_settings_section_two_content() {
	echo '<p>';
	_e('Manage optional usage of jQuery on the glossary listing page.');
	echo '</p>';
}
function wgGlossary_settings_section_three_content() {
	echo '<p>';
	_e('Use the groups taxonomy to organize the glossary listing page.');
	echo '</p>';
}
function wgGlossary_settings_section_four_content() {
	echo '<p>';
	_e('Other miscellaneous settings.');
	echo '</p>';
}
function wgGlossary_settings_section_five_content() {
	echo '<p>';
	_e('Help WordGallery Glossary get even better.');
	echo '</p>';
}


// == Field functions:
function wgGlossary_page_to_override_input() {
  
  // Input field
  echo '<select id="' . settingOneSlug . '" name="' . settingOneSlug . '">';
  echo '<option value="disabled" ';selected('disabled', get_option(settingOneSlug));echo '>** DISABLED **</option>';
  foreach(get_pages() as $page) {
  	echo '<option value="' . $page->ID . '" ';selected($page->ID, get_option(settingOneSlug));echo '>' . $page->post_title . '</option>';
  }
  echo '</select>';
}
function wgGlossary_display_style_input() {
  
  // Input field
  $styleFiles = array();
			if ($handle = opendir(WP_PLUGIN_DIR . '/wordgallery-glossary/view/style')) {
			    while (false !== ($file = readdir($handle))) {
					if (ereg('.css$', $file)) {
				        array_push($styleFiles, $file);
					}
			    }
			    closedir($handle);
			}
  echo '<select id="' . settingTwoSlug . '" name="' . settingTwoSlug . '">';
  foreach($styleFiles as $style) {
  	echo '<option value="' . $style . '"';
  	selected($style, get_option(settingTwoSlug));
  	echo '>' . $style . '</option>';
  }
  echo '<option '. selected('Custom-Style.php', get_option(settingTwoSlug)) .' value="Custom-Style.php">* CUSTOM-STYLE</option>';
  echo '</select>';
}
function wgGlossary_custom_style_input() {
  
  // Input field
  echo '<p class="hint">The following CSS rules will apply if you select CUSTOM-STYLE above.<br/>
  	Erase everything in here and save to get back to the defaults.</p>';
  echo '<textarea id="' . settingThreeSlug . '" name="' . settingThreeSlug . '" cols="75" rows="10">' . get_option(settingThreeSlug) . '</textarea>';
  }
function wgGlossary_use_jQuery_input() {
  
  // Input field
	echo '<input type="checkbox" id="'.settingFourSlug.'" name="'.settingFourSlug .'" ';
	checked(true , get_option(settingFourSlug));
	echo ' value="1" />';
}
function wgGlossary_jQuery_first_open_input() {
  
  // Input field (text)
	echo '<input type="text" id="'.settingFiveSlug.'" name="'.settingFiveSlug .'" value="' . get_option(settingFiveSlug) . '" />';
}
function wgGlossary_use_groups_taxonomy_input() {
  
  // Input field
	echo '<input type="checkbox" id="'.settingSixSlug.'" name="'.settingSixSlug .'" ';
	checked(true , get_option(settingSixSlug));
	echo ' value="1" />';
}
function wgGlossary_show_group_titles_input() {
  
  // Input field
	echo '<input type="checkbox" id="'.settingSevenSlug.'" name="'.settingSevenSlug .'" ';
	checked(true , get_option(settingSevenSlug));
	echo ' value="1" />';
}
function wgGlossary_show_group_key_input() {
  
  // Input field
	echo '<input type="checkbox" id="'.settingEightSlug.'" name="'.settingEightSlug .'" ';
	checked(true , get_option(settingEightSlug));
	echo ' value="1" />';
}
function wgGlossary_show_read_more_link_input() {
  
  // Input field
	echo '<input type="checkbox" id="'.settingNineSlug.'" name="'.settingNineSlug .'" ';
	checked(true , get_option(settingNineSlug));
	echo ' value="1" />';
}
function wgGlossary_read_more_text_input() {
  
  // Input field (text)
	echo '<input type="text" id="'.settingTenSlug.'" name="'.settingTenSlug .'" value="' . get_option(settingTenSlug) . '" />';
}
function wgGlossary_ignore_excerpts_input() {
  
  // Input field
	echo '<input type="checkbox" id="'.settingElevenSlug.'" name="'.settingElevenSlug .'" ';
	checked(true , get_option(settingElevenSlug));
	echo ' value="1" />';
}
function wgGlossary_show_credit_link_input() {
  
  // Input field
	echo '<input type="checkbox" id="'.settingTwelveSlug.'" name="'.settingTwelveSlug .'" ';
	checked(true , get_option(settingTwelveSlug));
	echo ' value="1" />';
}


// These functions are referenced in the above settings section, field, and registration:
// Validating field input for saving setting one:
function wgGlossary_page_to_override_validate($input) {
	return $input;
}
function wgGlossary_display_style_validate($input) {
	return $input;
}
function wgGlossary_custom_style_validate($input) {
	global $wp_plugin_dir;
	if ($input == "") {
		$defaultCSS = file_get_contents($wp_plugin_dir . '/wordgallery-glossary/view/menu-page/default-style.css');
		return $defaultCSS;
	} else {
		return $input;
	}
}
function wgGlossary_use_jQuery_validate($input) {
	return $input;
}
function wgGlossary_jQuery_first_open_validate($input) {
	return $input;
}
function wgGlossary_use_groups_taxonomy_validate($input) {
	return $input;
}
function wgGlossary_show_group_titles_validate($input) {
	return $input;
}
function wgGlossary_show_group_key_validate($input) {
	return $input;
}
function wgGlossary_show_read_more_link_validate($input) {
	return $input;
}
function wgGlossary_read_more_text_validate($input) {
	return $input;
}
function wgGlossary_ignore_excerpts_validate($input) {
	return $input;
}
function wgGlossary_show_credit_link_validate($input) {
	return $input;
}




// Displaying the setting page
function wgGlossary_settings_manager() {
	
	echo "<h1>";
	_e(settingsPageTitle);
	echo "</h1>";
	
	// Setting up the action URI for our form, we need to send our 
	//	settings to the options.php page then redirect back to our 
	//	settings page.
	$optionsPageURI = "/wp-admin/options.php";
	$settingsPageURI = "/wp-admin/options-general.php?page=settingsPageSlug";
	$actionURI  = $optionsPageURI . '?redirect_to=' . $settingsPageURI;
	
	?>
		<form action="<?php echo $actionURI; ?>" method="post">
			<?php settings_fields(settingsPageID); ?>
			<?php do_settings_sections(settingsPageID); ?>
			<div class="submit">
				<input name="Submit" class="primary-button" type="submit" value="<?php esc_attr_e('Save Changes');?>" />
			</div>
		</form>
		
<?php
	echo <<<END
		<div style="">
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="BTZPHELVUG6WW">
			<input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
			<br/><br/>
			<a href="http://wordpress.org/extend/plugins/wordgallery-glossary/">Please leave a rating!</a>
		</div>
END;
}

function wgGlossary_add_settings_page() {
	
	add_options_page(settingsPageTitle, settingsMenuTitle,
		settingsMenuCapability, settingsPageSlug,
		settingsManagerFunction);
	
	// If you wanted to add an additional link to this settings page,
	//	 in the menu for a custom post type you could use something like this:
	add_submenu_page('edit.php?post_type=glossary-term', 
		'Settings', 'Settings', 
		settingsMenuCapability, settingsPageSlug, 
		settingsManagerFunction);
}
add_action('admin_menu', addSettingsPageFunction);

