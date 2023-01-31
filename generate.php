<?php
// require the website config file.
require_once('includes/config.php');

// the current character set.
$set = text_generator::current_set();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>

      <!-- website meta tags -->
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title><?php echo $website['name'];?> - <?php echo $set['name'];?></title>
      <meta name="description" content="convert your text into <?php echo $set['example'];?> text using our <?php echo $set['name'];?> text generator!" />

      <!-- website stylesheets -->
      <link href="<?php echo $website['url'];?>assets/css/styles.min.css?v=<?php echo $website['version'];?>" type="text/css" rel="stylesheet" />

      <!-- website javascript -->
      <script src="<?php echo $website['url'];?>assets/js/javascript.min.js?v=<?php echo $website['version'];?>" type="text/javascript"></script>

   </head>
   <body>

      <?php // include the website header.?>
      <?php include_once(PATH_HTML . 'header.php');?>

      <?php // include the website hero.?>
      <?php include_once(PATH_HTML . 'hero.php');?>

      <?php // include the website main.?>
      <?php include_once(PATH_HTML . 'main.php');?>

      <?php // include the website footer.?>
      <?php include_once(PATH_HTML . 'footer.php');?>

      <!-- page javascript -->
      <script type="text/javascript">window.setGeneratorEvents('generate-btn', 'clear-btn', 'text-input', 'text-output');</script>

   </body>
</html>