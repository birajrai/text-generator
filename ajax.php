<?php
// require the website config file.
require_once('includes/config.php');

// if the passed parameters are valid return a response.
if ( isset($_GET['slug']) && isset($website['sets'][$_GET['slug']]) && isset($_POST['text']) && $_POST['text'] !== '' ) {
   header('content-type: text/plain; charset=utf-8');
   echo text_generator::generate($_POST['text'], $website['sets'][$_GET['slug']]['characters'], true);
}
?>