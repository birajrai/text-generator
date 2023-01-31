<!-- website footer -->
<div id="footer">

   <div>
      <div class="row container">
         <div class="col4">
            <span>social media</span>
            <div>
               <a href="<?php echo $website['facebook-url'];?>" target="_blank">Facebook</a>
               <a href="<?php echo $website['github-url'];?>" target="_blank">Github</a>
            </div>
         </div>
         <div class="col4">
            <span><?php echo $website['name'];?></span>
            <div>
               <a href="<?php echo $website['url'];?>">home</a>
               <a href="mailto:<?php echo $website['email'];?>">contact</a>
            </div>
         </div>
         <div class="col4">
            <span>about us</span>
            <div>
               <p><?php echo $website['about'];?></p>
            </div>
         </div>
      </div>
   </div>

   <div>
      <div class="row container">
         <div class="col12">
            <p>copyright <?php echo $website['year'];?>, <?php echo $website['name'];?> all rights reserved.</p>
         </div>
      </div>
   </div>

</div>