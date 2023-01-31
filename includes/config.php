<?php
// global path constants.
define('PATH_ABSOLUTE', dirname(__FILE__) . '/../');
define('PATH_INCLUDES', PATH_ABSOLUTE . 'includes/');
define('PATH_HTML',     PATH_INCLUDES . 'html/');
define('PATH_JSON',     PATH_INCLUDES . 'json/');


// require the text generator class.
require_once(PATH_INCLUDES . 'text.generator.class.php');


// global website variables.
$website['version'] = '1.0';
$website['year']    = date('Y');
$website['url']     = text_generator::website_url();
$website['current'] = text_generator::current_url();
$website['stats']   = text_generator::get_stats();
$website['sets']    = text_generator::get_sets();
$website['more']    = array_rand($website['sets'], 4);
text_generator::load_config($website);
?>