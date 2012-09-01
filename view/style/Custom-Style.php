<?php header("Content-type: text/css"); ?>

<?php
define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */
require('../../../../../wp-blog-header.php');

add_action('wp', 'no_headers');
function no_headers() {
	remove_all_actions('send_headers');
}

header("Content-type: text/css");
 echo get_option("wgGlossary_custom_style");
?>