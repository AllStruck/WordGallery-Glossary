<?php

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
