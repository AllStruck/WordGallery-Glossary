<?php
/*
	wordgallery-glossary/model/functions.php
*/


function load_language() {
	// Internationalization, load all languages in the language folder.
	load_plugin_textdomain('wordgallery-glossary', false, basename( dirname( __FILE__ ) ) . '/language');
}

function plugin_activation() {
	// Flush rewrite rules so that custom post type urls don't show 404.
	add_glossary_item_post_type();
	flush_rewrite_rules();
}
function admin_notices() {
	// Alert if display style is not set
	if (!ereg('.css$', get_option("wgGlossary_display_style")) && !ereg('.php$', get_option("wgGlossary_display_style"))) {
		echo '<div class="error"><p><strong>';
			_e('The WordGallery Glossary plugin is active but you need to select a style on the ');
		echo '<a href="'. admin_url() . 'options-general.php?page=wg-glossary' .'">';
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
		echo '<a href="'. admin_url() . 'options-general.php?page=wg-glossary' .'">';
			_e('options page');
		echo '</a>.</strong></p></div>';
	}
}


/**
 * Glossary Widget
 */
class WGGlossaryWidget extends WP_Widget {
    /** constructor */
    function WGGlossaryWidget() {
        parent::WP_Widget(false, $name = 'WG Glossary');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
				$itemsTotal = apply_filters('number_of_items', $instance['number_of_items']);
				$itemsLinkToGlossaryPage = apply_filters('items_link_to_glossary_page', $instance['items_link_to_glossary_page']);
				$showFullGlossaryLinkOnBottom = apply_filters('show_full_glossary_link_on_bottom', $instance['show_full_glossary_link_on_bottom']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
					<?php
					$glossary_item_index = get_children(array(
														'post_type'		=> 'glossary-term',
														'post_status'	=> 'publish',
														'orderby'		=> 'title',
														'order'			=> 'ASC',
														'post_parent'	=> null,
														));
					if ($glossary_item_index){
						$itemsCount = count($glossary_item_index);
						$randomSeeds = array();
						if ($itemsTotal && $itemsTotal < $itemsCount) {
							$maxItems = $itemsTotal;
						} else {
							if ($itemsCount > 5) {
								$maxItems = 5;
							} else {
								$maxItems = $itemsCount;
							}
						}
						for ($i=0; $i<$maxItems;) {
							$randNum = rand(1, $itemsCount);
							if (in_array($randNum, $randomSeeds)) {
								// do nothing
							} else {
								array_push($randomSeeds, $randNum);
								// On to the next one
								$i++;
							}
						}
						$i = 1;
						echo "<ul>";
						foreach ($glossary_item_index as $item) {
							if (in_array($i, $randomSeeds)) {
								$gotoURL = ($itemsLinkToGlossaryPage == "on")? get_permalink(get_option("wgGlossary_page_to_override")) : get_permalink($item->ID);
								echo '<li><a href="'. $gotoURL .'">';
								echo $item->post_title;
								echo '</a></li>';
							}
							$i++;
						}
						echo "</ul>";
					}
					?>
              <?php if ($showFullGlossaryLinkOnBottom == "on") echo '<a class="wgGlossaryPageLink" style="float:right;margin:10px;color:red;" href="'. get_permalink(get_option("wgGlossary_page_to_override")) .'">' . _e('View all...') . '</a><br/>'; ?>
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['number_of_items'] = strip_tags($new_instance['number_of_items']);
			$instance['items_link_to_glossary_page'] = strip_tags($new_instance['items_link_to_glossary_page']);
			$instance['show_full_glossary_link_on_bottom'] = strip_tags($new_instance['show_full_glossary_link_on_bottom']);
      return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
        $title = esc_attr($instance['title']);
				$itemsTotal = esc_attr($instance['number_of_items']);
				$itemsLinkToGlossaryPage = esc_attr($instance['items_link_to_glossary_page']);
				$showFullGlossaryLinkOnBottom = esc_attr($instance['show_full_glossary_link_on_bottom']);
        ?>
	       <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label> 
					<br/><br/>
				  <label for="<?php echo $this->get_field_id('number_of_items'); ?>"><?php _e('Number of items:'); ?>
					<input class="widefat" id="<?php echo $this->get_field_id('number_of_items'); ?>" name="<?php echo $this->get_field_name('number_of_items'); ?>" type="text" value="<?php echo $itemsTotal; ?>" /></label>
					<br/><br/>
					<label for="<?php echo $this->get_field_id('items_link_to_glossary_page'); ?>">
					<input type="checkbox" id="<?php echo $this->get_field_id('items_link_to_glossary_page'); ?>" name="<?php echo $this->get_field_name('items_link_to_glossary_page'); ?>" <?php checked("on", $itemsLinkToGlossaryPage); ?> /> Link items to glossary page.</label>
					<br/><br/>
					<label for="<?php echo $this->get_field_id('show_full_glossary_link_on_bottom'); ?>">
					<input type="checkbox" id="<?php echo $this->get_field_id('show_full_glossary_link_on_bottom'); ?>" name="<?php echo $this->get_field_name('show_full_glossary_link_on_bottom'); ?>" <?php checked("on", $showFullGlossaryLinkOnBottom); ?> /> Show full glossary link on bottom.</label>
        </p>
        <?php 
    }

}

/**
 * Add a link to the settings page on the plugins list
 */
function wg_add_action_link( $links, $file ) {
	static $this_plugin;
	$this_plugin = 'wordgallery-glossary/wordgallery-glossary.php';
	$plugin_options_url = '/wp-admin/options-general.php?page=wg-glossary';

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
		
		# Enqeue the jQuery only if the visitor is viewing the glossary page right now:
		if (is_page($glossaryPageID) && $jQueryOptionEnabled) {
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

// Display glossary page
function wgGlossary_display_page($content){
	$glossaryPageID = get_option('wgGlossary_page_to_override');
	$glossaryDisplayOrder = 'ASC';
	$useGroupsOrganization = get_option('wgGlossary_use_groups_taxonomy');
	$showGroupNames = get_option('wgGlossary_show_group_titles');
	$showGroupNameIndex = get_option('wgGlossary_show_group_key');
	
	if (is_numeric($glossaryPageID) && is_page($glossaryPageID)){ // We're on the glossary page, get to showing the terms...
		if ($useGroupsOrganization) { // Use the custom taxonomy Group to organize our glossary terms:
			$taxonomy = 'glossary-term-group';
			$groups = get_terms($taxonomy); 
			if ($groups) {
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
								$readMoreLink = ' <br/> <a class="wgGlossaryItemReadMoreLink" style="float:right;" href="' . get_permalink($item) . '">' . get_option('wgGlossary_read_more_text').'</a>';
								$content .= $readMoreLink;
							}
								$content .= "</div></div>";
						}
						$content .= "</div>";
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
						$readMoreLink = ' <br/> <a class="wgGlossaryItemReadMoreLink" style="float:right;" href="' . get_permalink($item) . '">' . get_option('wgGlossary_read_more_text').'</a>';
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

?>