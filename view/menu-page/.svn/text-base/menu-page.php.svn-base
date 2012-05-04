<?php

// Add options panel to admin menu
function wg_glossary_menu() {
	add_options_page("Glossary Terms Settings", "Glossary Terms", 'manage_options', get_option('wgGlossary_url_slug'), 'wg_glossary_options');
	add_submenu_page('edit.php?post_type=glossary-term', "Settings", "Settings", 'manage_options', get_option('wgGlossary_url_slug') . "-settings", 'wg_glossary_options');
}

// WG Glossary options display
function wg_glossary_options() {
	extract($GLOBALS);
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	echo '<div class="wrap">';
	echo '
		<div style="float:right; margin:37px; text-align:center;">
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="BTZPHELVUG6WW">
		<input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
		<br/><br/>
		<a href="http://wordpress.org/extend/plugins/wordgallery-glossary/">Please leave a rating!</a>
		</div>
		';
	echo '<h2>WordGallery Glossary Settings</h2>';
	echo '<span class="optionPagePluginAuthorCaption">Created by <strong><a href="http://iwantdavid.com">David William Monaghan</a></strong> of <strong><a href="http://www.allstruck.com">AllStruck</a></strong></span>';
	echo '<div class="optionPagePluginDetailsCaption">For more information about this plugin please visit the <strong><a href="http://wordgallery-glossary.allstruck.com">WordGallery Glossary plugin homepage</a>.</strong></div>';
	echo '<h3>Options</h3>';
	echo '<form method="post" action="options.php">';
	wp_nonce_field('update-options');
	echo '<p>
			<fieldset><label for="wgGlossary_page_to_override"><legend class="screen-reader-text"><span>Page to Override</span></legend><select name="wgGlossary_page_to_override" id="wgGlossary_page_to_override">';
			$selectedTrick = "" == get_option('wgGlossary_page_to_override')? " SELECTED " : "";
			echo "<option value=''$selectedTrick>---> Select A Page</option>";
			$selectedTrick = "disabled" == get_option('wgGlossary_page_to_override')? " SELECTED " : "";
			echo "<option value='disabled'$selectedTrick>NONE/DISABLED</option>";
				foreach(get_pages() as $page) {
					$id = $page->ID;
					$selectedTrick = $id == get_option('wgGlossary_page_to_override')? " SELECTED " : "";
					
					$title = $page->post_title;
					echo <<<END
					<option value="$id" $selectedTrick >$title</option>
END;
			}
			echo '</select>';
			echo ' Page to override (All of the Glossary terms will be displayed here in alphabetical order.)</label></fieldset>';

			echo '<p><fieldset><label for="wgGlossary_show_credit_link"><input type="checkbox" id="wgGlossary_show_credit_link" name="wgGlossary_show_credit_link" ';
			checked(true, get_option('wgGlossary_show_credit_link'));
			echo ' value="1" /> Show credit link (there really is no telling how amazing the outcome of this will be).</label></fieldset></p>';
			
			echo '<p><fieldset><label for="wgGlossary_ignore_excerpt"><input type="checkbox" id="wgGlossary_ignore_excerpt" name="wgGlossary_ignore_excerpt" ';
			checked(true, get_option('wgGlossary_ignore_excerpt'));
			echo ' value="1" /> Ignore excerpts.</label></fieldset></p>';
			
			echo '<p><fieldset><input type="checkbox" id="wgGlossary_show_read_more_link" name="wgGlossary_show_read_more_link" ';
			checked(true, get_option('wgGlossary_show_read_more_link'));
			echo ' value="1" /> ';
			echo '<label for="wgGlossary_show_read_more_link">Display "read more" link. </label></fieldset>';
			echo '<label for="wgGlossary_read_more_text">With this text:</label> <input type="text" id="wgGlossary_read_more_text" name="wgGlossary_read_more_text" value="'. get_option('wgGlossary_read_more_text') .'" /></p>';
			
			echo '<p><fieldset><label for="wgGlossary_use_jQuery"><input type="checkbox" id="wgGlossary_use_jQuery" name="wgGlossary_use_jQuery" ';
			checked(true, get_option('wgGlossary_use_jQuery'));
			echo ' value="1" /> ';
			echo'Use jQuery animated display.</label></fieldset> <label for="wgGlossary_jQuery_first_open">Start with item #: <input type="text" size="2" id="wgGlossary_jQuery_first_open" name="wgGlossary_jQuery_first_open" value="'. get_option('wgGlossary_jQuery_first_open') .'" />open on page load.</label></p>';
			
			echo '<p><fieldset><label for="wgGlossary_display_style"><select id="wgGlossary_display_style" name="wgGlossary_display_style">';
			$styleFiles = array();
			if ($handle = opendir(WP_PLUGIN_DIR . '/wordgallery-glossary/view/style')) {
			    while (false !== ($file = readdir($handle))) {
					if (ereg('.css$', $file)) {
				        array_push($styleFiles, $file);
					}
			    }
			    closedir($handle);
			}
			
			foreach ($styleFiles as $file) {
				echo '
				<option value="'. $file .'"';
				selected($file, get_option("wgGlossary_display_style"));
				echo '>'. $file .'</option>
				';
			}
			echo '<option '. selected('Custom-Style.php', get_option("wgGlossary_display_style")) .' value="Custom-Style.php">* CUSTOM-STYLE</option>';
			echo '</select>';
			echo ' Display Style</label></fieldset></p>';
			echo '<fieldset><label for="wgGlossary_custom_style"><span>Custom style (the following CSS rules will apply if you select CUSTOM-STYLE above):</span><br/>';
			echo '<span>If you want to reset the custom style back to the original helper values, erase all of the contents and save, <strong>twice</strong>!</span>';			
			echo '<textarea id="wgGlossary_custom_style" name="wgGlossary_custom_style" cols="75" rows="10">';
			if (get_option("wgGlossary_custom_style") == "") {
				echo '
/* == Set everything to defaults == */
#wgGlossaryItemList * { border:0px !important; text-decoration:none; padding:0 !important; margin:0 !important; }
#wgGlossaryItemList blockquote { margin:2em !important; }
#wgGlossaryItemList ul, #wgGlossaryItemList ol { margin-left:2em !important; }
#wgGlossaryItemList del { text-decoration: line-through !important; }
#wgGlossaryItemList ins { text-decoration: underline !important; color:#000 !important; background-color:#fff !important; }
#wgGlossaryItemList code { 
	display:block !important; border:3px !important; background-color:#000 !important; color:#00C700 !important; 
	opacity:.7; -moz-opacity:.7; -moz-border-radius: .5em; border-radius: .5em;
	margin: 2em 5em !important;
	padding: 1em !important;
}

/* == Title Text Colors == */
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemTitle { color: black !important; }
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemTitle a { color: black !important; }
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemTitle a:hover { color: black !important; }
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemTitle a:active { color: black !important; }
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemTitle a:visited { color: black !important; }



/* == Definition Text Colors == */
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemDefinition { color: white !important; }
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemDefinition strong { color:black !important; }
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemDefinition a { color: blue !important; }
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemDefinition a:hover { color: blue !important; }
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemDefinition a:active { color: blue !important; }
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemDefinition a:visited { color: blue !important; }


/* == Title Background Color == */
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemTitle { 
	background-color: white !important;
}

/* == Definition Background Color == */
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemDefinition { 
	background-color: gray !important;
}


/* == Title Borders and Corners == */
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemTitle {
	-moz-border-radius: 3em 3em 3em 3em !important;
	border-radius: 3em 3em 3em 3em !important;
	border:3.5px solid red !important;
}

/* == Definition Borders and Corners == */
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemDefinition {
	-moz-border-radius: 1em 1em 7em 1em !important;
	border-radius: 1em 1em 7em 1em !important;
}


/* == Title Margins and Paddings == */
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemTitle { 
	padding:10px !important;
	margin-bottom: 5px !important;
}

/* == Definition Margins and Paddings == */
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemDefinition {
	margin-bottom:7px !important;
	margin-left:17px !important;
	margin-top:-7px !important;
	margin-right:3px !important;
	padding:7px !important;
	padding-bottom:16px !important;
}


/* == Title Positioning == */
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemTitle { z-index: 10 !important; position: relative; }

/* == Definition Positioning == */
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemDefinition { z-index: 9 !important; position: relative; }

/* == Read More Link == */
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemDefinition a.wgGlossaryItemReadMoreLink {
	-moz-border-radius: 3em 3em 3em 3em !important;
	border-radius: 3em 3em 3em 3em !important;
	background-color: gray !important;
	margin-bottom:10px !important;
	margin-right:4em !important;
	color:pink !important;
	padding:1em !important;
}

/* == General == */
#wgGlossaryItemList {}
#wgGlossaryItemList .wgGlossaryItemWrapper {}
#wgGlossaryItemList .wgGlossaryItemWrapper .wgGlossaryItemTitle { clear:both; }



/* + and - sign before title if jQuery is enabled */
.wgGlossaryItemTitle:before { content : "(+) "; }
.wgGlossaryItemTitle.active:before { content: "(ó) "; }

/* adds a colon to end of title when expanded using jQuery */
.wgGlossaryItemTitle a:after { content:""; }
.wgGlossaryItemTitle.active a:after { content:":"; }';
			} else {
				echo get_option("wgGlossary_custom_style");
			}
			echo '</textarea></label></fieldset>';
			
			echo '<input type="hidden" name="action" value="update" />
		    <input type="hidden" name="page_options" value="wgGlossary_page_to_override,wgGlossary_ignore_excerpt, wgGlossary_show_read_more_link, wgGlossary_read_more_text, wgGlossary_use_jQuery, wgGlossary_jQuery_first_open, wgGlossary_display_style, wgGlossary_custom_style, wgGlossary_show_credit_link" />';
		    
			echo '<p><input type="submit" class="button-primary" value="Save WordGallery Glossary Settings" name="wgGlossarySave" /></p>';
			echo '</p>';
			echo '</form>';
	
	
	if (isset($_POST["wgGlossarySave"])) {
		//update the page options
		update_option('wgGlossary_page_to_override',$_POST["wgGlossary_page_to_override"]);
		update_option('wgGlossary_read_more_text',$_POST["wgGlossary_read_more_text"]);
		update_option('wgGlossary_jQuery_first_open', $_POST["wgGlossary_jQuery_first_open"]);
		update_option('wgGlossary_display_style', $_POST["wgGlossary_display_style"]);
		update_option('wgGlossary_custom_style', $_POST["wgGlossary_custom_style"]);
		$options_names = array('wgGlossary_show_credit_link', 'wgGlossary_ignore_excerpt', 'wgGlossary_show_read_more_link', 'wgGlossary_use_jQuery');
		foreach($options_names as $option_name){
			if ($_POST[$option_name] == 1) {
				update_option($option_name,1);
			}
			else {
				update_option($option_name,0);
			}
		}
	}
}


?>