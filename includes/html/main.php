<!-- website main -->
<div id="main">

   <?php if ( isset($set) ):?>

      <!-- generation form -->
      <div id="generation-form">
         <div class="row container">
            <div class="col6">
               <textarea id="text-input" placeholder="text input"></textarea>
            </div>
            <div class="col6">
               <textarea id="text-output" placeholder="text output"></textarea>
            </div>
            <div class="col3">
               <button id="generate-btn" class="green-btn">generate</button>
            </div>
            <div class="col3">
               <button id="clear-btn" class="blue-btn">clear</button>
            </div>
         </div>
      </div>

      <!-- more character sets -->
      <div id="character-sets">
         <div class="row container">
            <div class="col12">
               <h2>more text generators</h2>
               <p>here are some more text generators for you to try out.</p>
            </div>
            <?php foreach ( $website['more'] as $value ):?>
               <div class="col6">
                  <a href="<?php echo $website['sets'][$value]['url'];?>">
                     <span><?php echo $website['sets'][$value]['name'];?></span>
                     <p>convert your text into <?php echo $website['sets'][$value]['example'];?> text using our <?php echo $website['sets'][$value]['name'];?> text generator</p>
                  </a>
               </div>
            <?php endforeach;?>
         </div>
      </div>

   <?php else:?>

      <!-- website statistics -->
      <div id="statistics">
         <div class="row container">
            <div class="col4">
               <span><b class="animate-number" data-number="<?php echo $website['stats']['sets'];?>" data-duration="2000">0</b> text generators</span>
               <p>we have <b><?php echo number_format($website['stats']['sets']);?></b> different text generators for you to choose from</p>
            </div>
            <div class="col4">
               <span><b class="animate-number" data-number="<?php echo $website['stats']['uses'];?>" data-duration="2000">0</b> times</span>
               <p>our text generators have been used <b><?php echo number_format($website['stats']['uses']);?></b> times and counting</p>
            </div>
            <div class="col4">
               <span><b class="animate-number" data-number="<?php echo $website['stats']['characters'];?>" data-duration="2000">0</b> characters</span>
               <p>we have converted <b><?php echo number_format($website['stats']['characters']);?></b> characters into cool text and counting</p>
            </div>
         </div>
      </div>

      <!-- character sets -->
      <div id="character-sets">
         <div class="row container">
            <?php foreach ( $website['sets'] as $set ):?>
               <div class="col6">
                  <a href="<?php echo $set['url'];?>">
                     <span><?php echo $set['name'];?></span>
                     <p>convert your text into <?php echo $set['example'];?> text using our <?php echo $set['name'];?> text generator</p>
                  </a>
               </div>
            <?php endforeach;?>
         </div>
      </div>

   <?php endif;?>

</div>