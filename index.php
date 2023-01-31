<?php // require the website config file. ?>
<?php require_once('includes/config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>

      <!-- website meta tags -->
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title><?php echo $website['name'];?></title>
      <meta name="description" content="generate cool text what can be used on Youtube, Twitter, Instagram, Discord and more!" />

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
      <script type="text/javascript">window.animateNumbers('animate-number');</script>

   </body>
</html>