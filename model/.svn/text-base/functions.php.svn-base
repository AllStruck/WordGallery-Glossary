<?php
/*
	wordgallery-glossary/model/functions.php
*/

// Shortcode to display glossary anywhere:
function wgGlossary_glossary_terms_shortcode( $attr ) {
	extract( shortcode_atts( array(
		'style' => get_option(wgGlossarySettingTwoSlug),
		'groups' => '',
		'use_jquery' => get_option(wgGlossarySettingFourSlug),
		'keep_open_number' => get_option(wgGlossarySettingFiveSlug),
		'group_organize' => get_option(wgGlossarySettingSixSlug),
		'show_group_names' => get_option(wgGlossarySettingSevenSlug),
		'show_group_key' => get_option(wgGlossarySettingEightSlug),
		'show_read_more' => get_option(wgGlossarySettingNineSlug),
		'read_more_text' => get_option(wgGlossarySettingTenSlug),
		'ignore_excerpts' => get_option(wgGlossarySettingElevenSlug),
		'show_credit_link' => get_option(wgGlossarySettingTwelveSlug)
	), $attr ) );
	
	return wgGlossary_display_glossary(FALSE, $group_organize, $show_group_names, $show_group_key, $use_jquery, $read_more_text);

}

// Display glossary on page selected in settings:
function wgGlossary_glossary_terms_page_override($content) {
	$content .= wgGlossary_display_glossary();
	return $content;
}

// Display glossary terms:
function wgGlossary_display_glossary(
	$overridePageVersion = TRUE,
	$useGroupsOrganization = wgGlossaryUseGroupsTaxonomy,
	$showGroupNames = wgGlossaryShowGroupTitles, 
	$showGroupNameIndex = wgGlossaryShowGroupKey,
	$useJQuery = wgGlossaryUseJQuery,
	$readMoreText = wgGlossaryReadMoreText) {
	
	$glossaryDisplayOrder = 'ASC';
	
	if (!(($overridePageVersion === FALSE) || ($overridePageVersion === TRUE))) {
		exit(__('ERROR: First argument of wgGlossary_display_glossary() must be of type: Boolean.'));
	}
	
	if (empty($content)) {
		$content = '';
	}
	
	
	
	if (($overridePageVersion === FALSE) || ($overridePageVersion && is_numeric(wgGlossaryPageToOverride) && is_page(wgGlossaryPageToOverride))){
		if ($useGroupsOrganization) { // Use the custom taxonomy Group to organize our glossary terms:
			$taxonomy = 'glossary-term-group';
			$groups = get_terms($taxonomy); 
			if ( !empty($groups) ) {
				if ($showGroupNameIndex) {
					$content .= '<div id="groupNameIndex">';
					foreach ($groups as $key=>$group) {
						$content .= '<a href="#'.$group->name.'">'.$group->name.'</a>';
						$content .= ($key == count($groups) - 1) ? "" : " | ";
					}
					$content .= '</div>';
				}
				$content .= '<div id="wgGlossaryItemList">';
			  foreach ($groups  as $group ) {
			  	if (!empty($group->name)) {
				  	$content .= '<div class="wgGlossaryItemGroup">';
				  	$content .= '<a class="wgGlossaryItemGroupTarget" name="'.$group->name.'"></a>';
				  	if ($showGroupNames) {
					  	$content .= '<div class="wgGlossaryGroupName">' . $group->name . '</div>';
				  	}
						$glossary_item_index = get_posts(array(
															'post_type'		=> 'glossary-term',
															'post_status'	=> 'publish',
															'orderby'		=> 'title',
															'order'			=> $glossaryDisplayOrder,
															'post_parent'	=> null,
															$taxonomy => $group->name,
															));
						if ($glossary_item_index){
							$excerptIgnore = get_option('wgGlossary_ignore_excerpt');
				
							foreach($glossary_item_index as $item){
								global $excerptIgnore;
								$content .= '<div class="wgGlossaryItemWrapper"><h4 class="wgGlossaryItemTitle"><a href="' . get_permalink($item) . '">' . $item->post_title . '</a></h4>';
								$content .= '<div class="wgGlossaryItemDefinition">';
								if ((($item->post_excerpt == "") || (get_option('wgGlossary_ignore_excerpt') == 1))) {
									$content .= $item->post_content;
								} else {
									$content .= $item->post_excerpt;
								}
								if (get_option('wgGlossary_show_read_more_link') == 1) { 	
									$readMoreLink = ' <br/> <a class="wgGlossaryItemReadMoreLink" style="float:right;" href="' . get_permalink($item) . '">' . $readMoreText .'</a>';
									$content .= $readMoreLink;
								}
									$content .= "</div></div>";
							}
							$content .= "</div>";
						}
			  	}
			  }
				if (get_option('wgGlossary_show_credit_link')) {
					$content .= '<div class="wgGlossaryCreditLink" style="text-align:center; margin:2em !important; clear:both;">Glossary created using <a href="http://wordgallery-glossary.allstruck.com">WordGallery Glossary</a></div>';
				}
				$content .= '</div>';
			}  

		} else { // Option to use groups is off, just show all of the terms together:
			$glossary_item_index = get_children(array(
												'post_type'		=> 'glossary-term',
												'post_status'	=> 'publish',
												'orderby'		=> 'title',
												'order'			=> $glossaryDisplayOrder,
												'post_parent'	=> null,
												));
			if ($glossary_item_index){
				$excerptIgnore = get_option('wgGlossary_ignore_excerpt');
	
				$content .= '<div id="wgGlossaryItemList">';
				foreach($glossary_item_index as $item){
					global $excerptIgnore;
					$content .= '<div class="wgGlossaryItemWrapper"><h4 class="wgGlossaryItemTitle"><a href="' . get_permalink($item) . '">' . $item->post_title . '</a></h4>';
					$content .= '<div class="wgGlossaryItemDefinition">';
					if ((($item->post_excerpt == "") || (get_option('wgGlossary_ignore_excerpt') == 1))) {
						$content .= $item->post_content;
					} else {
						$content .= $item->post_excerpt;
					}
					if (get_option('wgGlossary_show_read_more_link') == 1) { 	
						$readMoreLink = ' <br/> <a class="wgGlossaryItemReadMoreLink" style="float:right;" href="' . get_permalink($item) . '">' . $readMoreText .'</a>';
						$content .= $readMoreLink;
					}
						$content .= "</div></div>";
				}
				if (get_option('wgGlossary_show_credit_link')) {
					$content .= '<div class="wgGlossaryCreditLink" style="text-align:center; margin:2em !important; clear:both;">Glossary created using <a href="http://wordgallery-glossary.allstruck.com">WordGallery Glossary</a></div>';
				}
				$content .= '</div>';
			}
		}
	}
	return $content;
}


function load_language() {
	// Internationalization, load all languages in the language folder.
	load_plugin_textdomain('wordgallery-glossary', false, basename( dirname( __FILE__ ) ) . '/language');
}

function admin_notices() {
	// Alert if display style is not set
	if (!ereg('.css$', get_option("wgGlossary_display_style")) && !ereg('.php$', get_option("wgGlossary_display_style"))) {
		echo '<div class="error"><p><strong>';
			_e('The WordGallery Glossary plugin is active but you need to select a style on the ');
		echo '<a href="'. admin_url() . 'options-general.php?page=' . wgGlossarySettingsPageSlug . '">';
			_e('WG Glossary options page');
		echo '</a>.</strong></p></div>';
	}
	// Alert if override page is not set
	if (get_option("wgGlossary_page_to_override") == "") {
		echo '<div class="error"><p><strong>';
			_e('The WordGallery Glossary plugin is active but you do not have a page selected.');
		echo '</p>';
		echo '<p>';
			_e('Create and publish a blank page and select it on the ');
		echo '<a href="'. admin_url() . 'options-general.php?page=' . wgGlossarySettingsPageSlug .'">';
			_e('options page');
		echo '</a>.</strong></p></div>';
	}
}



/**
 * Add a link to the settings page on the plugins list
 */
function wg_add_action_link( $links, $file ) {
	static $this_plugin;
	$this_plugin = 'wordgallery-glossary/wordgallery-glossary.php';
	$plugin_options_url = '/wp-admin/options-general.php?page=' . wgGlossarySettingsPageSlug;

	if ( $file == $this_plugin ) {
		$settings_link = '<a href="' . $plugin_options_url . '">' . __('Settings') . '</a>';
		array_unshift( $links, $settings_link );
	}
	return $links;
}

/* Add jQuery include using enqueue_script */
function wgg_add_jquery_to_frontend() {
		$jQueryOptionEnabled = get_option("wgGlossary_use_jQuery");
		$glossaryPageID = get_option("wgGlossary_page_to_override");
		
		$currentPageHasShortcode = TRUE;
		
		# Enqeue the jQuery only if the visitor is viewing the glossary page (or one using the shortcode) right now:
		if ((is_page($glossaryPageID) && $jQueryOptionEnabled) || $currentPageHasShortcode) {
			wp_deregister_script('jquery');
			wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js');
			wp_enqueue_script('jquery');
		}
}

/* Add Stylesheets to frontend */
function wgg_add_stylesheets_to_frontend() {
	// Add style as selected in options
	wp_register_style( 'wgGlossaryStyle', WP_PLUGIN_URL . '/wordgallery-glossary/view/style/' . get_option("wgGlossary_display_style") );
	wp_enqueue_style('wgGlossaryStyle');
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




function wgGlossary_activate_plugin() {
	wgGlossary_create_options();
	flush_rewrite_rules();
}

function wgGlossary_deactivate_plugin() {
}

?>