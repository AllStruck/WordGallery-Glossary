<?php
/*
	wordgallery-glossary/controller/main.php
	- Initialize plugin core.
*/

	require_once(WP_PLUGIN_DIR . '/wordgallery-glossary/controller/setup.php');
	require_once(WP_PLUGIN_DIR . '/wordgallery-glossary/model/default-options.php');
	
	require_once(WP_PLUGIN_DIR . '/wordgallery-glossary/model/custom-post-type/custom-post-type.php');

	require_once(WP_PLUGIN_DIR . '/wordgallery-glossary/model/functions.php');
	require_once(WP_PLUGIN_DIR . '/wordgallery-glossary/controller/hooks.php');

	require_once(WP_PLUGIN_DIR . '/wordgallery-glossary/view/settings-page/settings-page.php');
	
	require_once(WP_PLUGIN_DIR . '/wordgallery-glossary/view/random-terms-widget/random-terms-widget.php');

?>