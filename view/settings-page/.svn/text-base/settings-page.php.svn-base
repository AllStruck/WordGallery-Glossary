<?php

// Create a function for initializing our new wgGlossarySettings:
function wgGlossary_init_settings() {	
	// Flush rewrite rules in case our post type slug was changed:
	flush_rewrite_rules();
	
	// wgGlossarySettings section:
	// Multiple wgGlossarySettings can go into this section after we set it up.
	// We are going to add three wgGlossarySettings into this one section.
		add_settings_section(wgGlossarySettingsSectionOneSlug, wgGlossarySettingsSectionOneTitle, 
			wgGlossarySettingsSectionOneCallbackFunction, wgGlossarySettingsPageID);
		add_settings_section(wgGlossarySettingsSectionTwoSlug, wgGlossarySettingsSectionTwoTitle, 
			wgGlossarySettingsSectionTwoCallbackFunction, wgGlossarySettingsPageID);
		add_settings_section(wgGlossarySettingsSectionThreeSlug, wgGlossarySettingsSectionThreeTitle, 
			wgGlossarySettingsSectionThreeCallbackFunction, wgGlossarySettingsPageID);
		add_settings_section(wgGlossarySettingsSectionFourSlug, wgGlossarySettingsSectionFourTitle, 
			wgGlossarySettingsSectionFourCallbackFunction, wgGlossarySettingsPageID);
		add_settings_section(wgGlossarySettingsSectionFiveSlug, wgGlossarySettingsSectionFiveTitle, 
			wgGlossarySettingsSectionFiveCallbackFunction, wgGlossarySettingsPageID);
		add_settings_section(wgGlossarySettingsSectionSixSlug, wgGlossarySettingsSectionSixTitle,
			wgGlossarySettingsSectionSixCallbackFunction, wgGlossarySettingsPageID);
	
	// wgGlossarySettings field:
	// We add wgGlossarySettings fields to our wgGlossarySettings section:
		add_settings_field(wgGlossarySettingOneSlug, wgGlossarySettingOneTitle, wgGlossarySettingOneCallbackFunction, 
			wgGlossarySettingsPageID, wgGlossarySettingOneSection, array( 'label_for' => wgGlossarySettingOneSlug ));
		add_settings_field(wgGlossarySettingTwoSlug, wgGlossarySettingTwoTitle, wgGlossarySettingTwoCallbackFunction, 
			wgGlossarySettingsPageID, wgGlossarySettingTwoSection, array( 'label_for' => wgGlossarySettingTwoSlug ));
		add_settings_field(wgGlossarySettingThreeSlug, wgGlossarySettingThreeTitle, wgGlossarySettingThreeCallbackFunction, 
			wgGlossarySettingsPageID, wgGlossarySettingThreeSection, array( 'label_for' => wgGlossarySettingThreeSlug ));
		add_settings_field(wgGlossarySettingFourSlug, wgGlossarySettingFourTitle, wgGlossarySettingFourCallbackFunction, 
			wgGlossarySettingsPageID, wgGlossarySettingFourSection, array( 'label_for' => wgGlossarySettingFourSlug ));
		add_settings_field(wgGlossarySettingFiveSlug, wgGlossarySettingFiveTitle, wgGlossarySettingFiveCallbackFunction, 
			wgGlossarySettingsPageID, wgGlossarySettingFiveSection, array( 'label_for' => wgGlossarySettingFiveSlug ));
		add_settings_field(wgGlossarySettingSixSlug, wgGlossarySettingSixTitle, wgGlossarySettingSixCallbackFunction, 
			wgGlossarySettingsPageID, wgGlossarySettingSixSection, array( 'label_for' => wgGlossarySettingSixSlug ));
		add_settings_field(wgGlossarySettingSevenSlug, wgGlossarySettingSevenTitle, wgGlossarySettingSevenCallbackFunction, 
			wgGlossarySettingsPageID, wgGlossarySettingSevenSection, array( 'label_for' => wgGlossarySettingSevenSlug ));
		add_settings_field(wgGlossarySettingEightSlug, wgGlossarySettingEightTitle, wgGlossarySettingEightCallbackFunction, 
			wgGlossarySettingsPageID, wgGlossarySettingEightSection, array( 'label_for' => wgGlossarySettingEightSlug ));
		add_settings_field(wgGlossarySettingNineSlug, wgGlossarySettingNineTitle, wgGlossarySettingNineCallbackFunction, 
			wgGlossarySettingsPageID, wgGlossarySettingNineSection, array( 'label_for' => wgGlossarySettingNineSlug ));
		add_settings_field(wgGlossarySettingTenSlug, wgGlossarySettingTenTitle, wgGlossarySettingTenCallbackFunction, 
			wgGlossarySettingsPageID, wgGlossarySettingTenSection, array( 'label_for' => wgGlossarySettingTenSlug ));
		add_settings_field(wgGlossarySettingElevenSlug, wgGlossarySettingElevenTitle, wgGlossarySettingElevenCallbackFunction, 
			wgGlossarySettingsPageID, wgGlossarySettingElevenSection, array( 'label_for' => wgGlossarySettingElevenSlug ));
		add_settings_field(wgGlossarySettingTwelveSlug, wgGlossarySettingTwelveTitle, wgGlossarySettingTwelveCallbackFunction, 
			wgGlossarySettingsPageID, wgGlossarySettingTwelveSection, array( 'label_for' => wgGlossarySettingTwelveSlug ));
		add_settings_field(wgGlossarySettingThirteenSlug, wgGlossarySettingThirteenTitle, wgGlossarySettingThirteenCallbackFunction, 
			wgGlossarySettingsPageID, wgGlossarySettingThirteenSection, array( 'label_for' => wgGlossarySettingThirteenSlug ));
		add_settings_field(wgGlossarySettingFourteenSlug, wgGlossarySettingFourteenTitle, wgGlossarySettingFourteenCallbackFunction, 
			wgGlossarySettingsPageID, wgGlossarySettingFourteenSection, array( 'label_for' => wgGlossarySettingFourteenSlug ));
		add_settings_field(wgGlossarySettingFifteenSlug, wgGlossarySettingFifteenTitle, wgGlossarySettingFifteenCallbackFunction, 
			wgGlossarySettingsPageID, wgGlossarySettingFifteenSection, array( 'label_for' => wgGlossarySettingFifteenSlug ));
		
	
	// wgGlossarySetting:
	// Now we register our wgGlossarySettings:
		register_setting(wgGlossarySettingsPageID, wgGlossarySettingOneSlug, wgGlossarySettingOneValidationFunction);
		register_setting(wgGlossarySettingsPageID, wgGlossarySettingTwoSlug, wgGlossarySettingTwoValidationFunction);
		register_setting(wgGlossarySettingsPageID, wgGlossarySettingThreeSlug, wgGlossarySettingThreeValidationFunction);
		register_setting(wgGlossarySettingsPageID, wgGlossarySettingFourSlug, wgGlossarySettingFourValidationFunction);
		register_setting(wgGlossarySettingsPageID, wgGlossarySettingFiveSlug, wgGlossarySettingFiveValidationFunction);
		register_setting(wgGlossarySettingsPageID, wgGlossarySettingSixSlug, wgGlossarySettingSixValidationFunction);
		register_setting(wgGlossarySettingsPageID, wgGlossarySettingSevenSlug, wgGlossarySettingSevenValidationFunction);
		register_setting(wgGlossarySettingsPageID, wgGlossarySettingEightSlug, wgGlossarySettingEightValidationFunction);
		register_setting(wgGlossarySettingsPageID, wgGlossarySettingNineSlug, wgGlossarySettingNineValidationFunction);
		register_setting(wgGlossarySettingsPageID, wgGlossarySettingTenSlug, wgGlossarySettingTenValidationFunction);
		register_setting(wgGlossarySettingsPageID, wgGlossarySettingElevenSlug, wgGlossarySettingElevenValidationFunction);
		register_setting(wgGlossarySettingsPageID, wgGlossarySettingTwelveSlug, wgGlossarySettingTwelveValidationFunction);
		register_setting(wgGlossarySettingsPageID, wgGlossarySettingThirteenSlug, wgGlossarySettingThirteenValidationFunction);
		register_setting(wgGlossarySettingsPageID, wgGlossarySettingFourteenSlug, wgGlossarySettingFourteenValidationFunction);
		register_setting(wgGlossarySettingsPageID, wgGlossarySettingFifteenSlug, wgGlossarySettingFifteenValidationFunction);
}
// Now call this function in the admin_init action hook:
// This makes sure our settigns are added to WordPress early enough in the loading process:
add_action('admin_init', initwgGlossarySettingsFunction);



// == wgGlossarySettings section functions:
function wgGlossary_settings_section_one_content() {
	echo '<p>';
	_e('These main Settings are required.');
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
	_e('Other miscellaneous Settings.');
	echo '</p>';
}
function wgGlossary_settings_section_five_content() {
	echo '<p>';
	_e('Help WordGallery Glossary get even better.');
	echo '</p>';
}
function wgGlossary_settings_section_six_content() {
	echo '<p>';
	_e('What else to delete if this plugin is deleted.');
	echo '</p>';
}


// == Field functions:
function wgGlossary_page_to_override_input() {
  
  // Input field
  echo '<select id="' . wgGlossarySettingOneSlug . '" name="' . wgGlossarySettingOneSlug . '">';
  echo '<option value="disabled" ';selected('disabled', get_option(wgGlossarySettingOneSlug));echo '>** DISABLED **</option>';
  foreach(get_pages() as $page) {
  	echo '<option value="' . $page->ID . '" ';selected($page->ID, get_option(wgGlossarySettingOneSlug));echo '>' . $page->post_title . '</option>';
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
  echo '<select id="' . wgGlossarySettingTwoSlug . '" name="' . wgGlossarySettingTwoSlug . '">';
  foreach($styleFiles as $style) {
  	echo '<option value="' . $style . '"';
  	selected($style, get_option(wgGlossarySettingTwoSlug));
  	echo '>' . $style . '</option>';
  }
  echo '<option '. selected('Custom-Style.php', get_option(wgGlossarySettingTwoSlug)) .' value="Custom-Style.php">* CUSTOM-STYLE</option>';
  echo '</select>';
}
function wgGlossary_custom_style_input() {
  
  // Input field
  echo '<p class="hint">The following CSS rules will apply if you select CUSTOM-STYLE above.<br/>
  	Erase everything in here and save to get back to the defaults.</p>';
  echo '<textarea id="' . wgGlossarySettingThreeSlug . '" name="' . wgGlossarySettingThreeSlug . '" cols="75" rows="10">' . get_option(wgGlossarySettingThreeSlug) . '</textarea>';
  }
function wgGlossary_use_jQuery_input() {
  
  // Input field
	echo '<input type="checkbox" id="'.wgGlossarySettingFourSlug.'" name="'.wgGlossarySettingFourSlug .'" ';
	checked(true , get_option(wgGlossarySettingFourSlug));
	echo ' value="1" />';
}
function wgGlossary_jQuery_first_open_input() {
  
  // Input field (text)
	echo '<input type="text" id="'.wgGlossarySettingFiveSlug.'" name="'.wgGlossarySettingFiveSlug .'" value="' . get_option(wgGlossarySettingFiveSlug) . '" />';
}
function wgGlossary_use_groups_taxonomy_input() {
  
  // Input field
	echo '<input type="checkbox" id="'.wgGlossarySettingSixSlug.'" name="'.wgGlossarySettingSixSlug .'" ';
	checked(true , get_option(wgGlossarySettingSixSlug));
	echo ' value="1" />';
}
function wgGlossary_show_group_titles_input() {
  
  // Input field
	echo '<input type="checkbox" id="'.wgGlossarySettingSevenSlug.'" name="'.wgGlossarySettingSevenSlug .'" ';
	checked(true , get_option(wgGlossarySettingSevenSlug));
	echo ' value="1" />';
}
function wgGlossary_show_group_key_input() {
  
  // Input field
	echo '<input type="checkbox" id="'.wgGlossarySettingEightSlug.'" name="'.wgGlossarySettingEightSlug .'" ';
	checked(true , get_option(wgGlossarySettingEightSlug));
	echo ' value="1" />';
}
function wgGlossary_show_read_more_link_input() {
  
  // Input field
	echo '<input type="checkbox" id="'.wgGlossarySettingNineSlug.'" name="'.wgGlossarySettingNineSlug .'" ';
	checked(true , get_option(wgGlossarySettingNineSlug));
	echo ' value="1" />';
}
function wgGlossary_read_more_text_input() {
  
  // Input field (text)
	echo '<input type="text" id="'.wgGlossarySettingTenSlug.'" name="'.wgGlossarySettingTenSlug .'" value="' . get_option(wgGlossarySettingTenSlug) . '" />';
}
function wgGlossary_ignore_excerpts_input() {
  
  // Input field
	echo '<input type="checkbox" id="'.wgGlossarySettingElevenSlug.'" name="'.wgGlossarySettingElevenSlug .'" ';
	checked(true , get_option(wgGlossarySettingElevenSlug));
	echo ' value="1" />';
}
function wgGlossary_show_credit_link_input() {
  
  // Input field
	echo '<input type="checkbox" id="'.wgGlossarySettingTwelveSlug.'" name="'.wgGlossarySettingTwelveSlug .'" ';
	checked(true , get_option(wgGlossarySettingTwelveSlug));
	echo ' value="1" />';
}
function wgGlossary_rewrite_slug_input() {
  
  // Input field (text)
	echo '<input type="text" id="'.wgGlossarySettingThirteenSlug.'" name="'.wgGlossarySettingThirteenSlug .'" value="' . get_option(wgGlossarySettingThirteenSlug) . '" />';
}
function wgGlossary_delete_settings_input() {
  
  // Input field
	echo '<input type="checkbox" id="'.wgGlossarySettingFourteenSlug.'" name="'.wgGlossarySettingFourteenSlug .'" ';
	checked(true , get_option(wgGlossarySettingFourteenSlug));
	echo ' value="1" />';
}
function wgGlossary_delete_posts_and_terms_input() {
  
  // Input field
	echo '<input type="checkbox" id="'.wgGlossarySettingFifteenSlug.'" name="'.wgGlossarySettingFifteenSlug .'" ';
	checked(true , get_option(wgGlossarySettingFifteenSlug));
	echo ' value="1" />';
}


// These functions are referenced in the above wgGlossarySettings section, field, and registration:
// Validating field input for saving wgGlossarySetting one:
function wgGlossary_page_to_override_validate($input) {
	return $input;
}
function wgGlossary_display_style_validate($input) {
	return $input;
}
function wgGlossary_custom_style_validate($input) {
	if ($input == "") {
		$defaultCSS = file_get_contents(DEFAULT_CSS_STYLE_FILE_LOCATION);
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
function wgGlossary_rewrite_slug_validate($input) {
	return $input;
}
function wgGlossary_delete_settings_validate($input) {
	return $input;
}
function wgGlossary_delete_posts_and_terms_validate($input) {
	return $input;
}




// Displaying the wgGlossarySetting page:
function wgGlossary_settings_manager() {
	
	echo "<h1>";
	_e(wgGlossarySettingsPageTitle);
	echo "</h1>";

	echo '<span class="optionPagePluginAuthorCaption">Created by <strong><a href="http://iwantdavid.com/">David William Monaghan</a></strong> of <strong><a href="http://allstruck.com/">AllStruck</a></strong></span>';
	echo '<div class="optionPagePluginDetailsCaption">For more information about this plugin please visit the <strong><a href="http://wordgallery-glossary.allstruck.com/">WordGallery Glossary plugin homepage</a>.</strong></div>';
	
	// wgGlossarySetting up the action URI for our form, we need to send our 
	//	wgGlossarySettings to the options.php page then redirect back to our 
	//	wgGlossarySettings page.
	$optionsPageURI = "/wp-admin/options.php";
	$wgGlossarySettingsPageURI = "/wp-admin/options-general.php?page=wgGlossarySettingsPageSlug";
	$actionURI  = $optionsPageURI . '?redirect_to=' . $wgGlossarySettingsPageURI;
	
	?>

		<form action="<?php echo $actionURI; ?>" method="post">
			<?php settings_fields(wgGlossarySettingsPageID); ?>
			<?php do_settings_sections(wgGlossarySettingsPageID); ?>
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
	
	add_options_page(wgGlossarySettingsPageTitle, wgGlossarySettingsMenuTitle,
		wgGlossarySettingsMenuCapability, wgGlossarySettingsPageSlug,
		wgGlossarySettingsManagerFunction);
	
	// If you wanted to add an additional link to this wgGlossarySettings page,
	//	 in the menu for a custom post type you could use something like this:
	add_submenu_page('edit.php?post_type=' . wgGlossaryCustomPostTypeSlug, 
		'Settings', 'Settings', 
		wgGlossarySettingsMenuCapability, wgGlossarySettingsPageSlug, 
		wgGlossarySettingsManagerFunction);
}
add_action('admin_menu', addwgGlossarySettingsPageFunction);

