<!-- website hero -->
<div id="hero">
   <div class="row container">

      <?php if ( isset($set) ):?>

         <div class="col12">
            <h1><?php echo $set['name'];?> text generator</h1>
            <p>convert your text into <?php echo $set['example'];?> text using our <?php echo $set['name'];?> text generator!</p>
         </div>

      <?php else:?>

         <div class="col12">
            <h1><?php echo $website['name'];?></h1>
            <p>generate cool text what can be used on Youtube, Twitter, Instagram, Discord and more!</p>
         </div>

      <?php endif;?>

   </div>
</div>