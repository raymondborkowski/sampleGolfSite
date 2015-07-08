
   <div id="slider1_container" style="position: relative; width: 600px;
        height: 500px; background-color: #000;">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 500px;
            overflow: hidden;">

                <?php
  			$directory = 'uploads';   
  			try {     
    			// Styling for images 
    			//echo '<div id="myslides">'; 
    			foreach ( new DirectoryIterator($directory) as $item ) {      
      				if ($item->isFile()) {
      					$path = $directory . '/' . $item; 
      					$image_info = getimagesize($path);
						$image_width = $image_info[0];
						$image_height = $image_info[1];
	
						if($image_height > $image_width){
							echo '<div><a u=image href="#"><img src="' . $path . '" width="370" height="500" /></a>
							</div>';
						}
        					elseif($image_height < $image_width){
        						echo '<div><a u=image href="#"><img src="' . $path . '" width="660" height="500" /></a></div>';
        					}
        					elseif($image_height == $image_width){
        						echo '<div><a u=image href="#"><img src="' . $path . '" width="500" height="500" /></a></div>';
        					}
      				}
    			} 
   		 //	echo '</div>';
  			} 
  				catch(Exception $e) {
    					echo 'No images found for this slideshow.<br />'; 
  				}
  		?>

            
        </div>


    
    </div>