<?php header("Content-type: text/css"); ?>

<?php
define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */
require('../../../../wp-blog-header.php');

 echo get_option("wgGlossary_custom_style");
?>