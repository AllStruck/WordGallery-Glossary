<?php
/*
	wordgallery-glossary/controller/main.php
	- Initialize plugin core.
*/

	require_once(WP_PLUGIN_DIR . '/wordgallery-glossary/model/setup.php');
	require_once(WP_PLUGIN_DIR . '/wordgallery-glossary/model/options.php');
	
	require_once(WP_PLUGIN_DIR . '/wordgallery-glossary/model/custom-post-type/custom-post-type.php');

	require_once(WP_PLUGIN_DIR . '/wordgallery-glossary/model/functions.php');
	require_once(WP_PLUGIN_DIR . '/wordgallery-glossary/controller/hooks.php');

	require_once(WP_PLUGIN_DIR . '/wordgallery-glossary/view/menu-page/menu-page.php');

?>