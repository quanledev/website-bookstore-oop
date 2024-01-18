<!--banner-->
<div class= "container-fluid">
        		 <div class= "row">
            		<?php
                    include 'sidebar.php'
                    ?>
            		<div class ="col-7 bg-white" style="height: 400px;">
               			<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  							<div class="carousel-indicators">
   								 <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
   								 <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
   								 <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
   								  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
 							 </div>
  							<div class="carousel-inner">
    							<div class="carousel-item active">
      								<img src="images/banner-1.jpg" class="d-block w-100" alt="..."  style="width: 732px; height: 400px;">
   								 </div>
    							<div class="carousel-item" >
     						 		<img src="images/banner-2.jpg" class="d-block w-100" alt="..."  style="width: 732px; height: 400px;">
    							</div>
   								 <div class="carousel-item">
     								 <img src="images/banner-3.jpg" class="d-block w-100" alt="..."  style="width: 732px; height: 400px;">
   								 </div>
   								 <div class="carousel-item">
     								 <img src="images/banner-4.jpg" class="d-block w-100" alt="..."  style="width: 732px; height: 400px;">
   								 </div>
 							 </div>
 							 <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
   							 	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
   								 <span class="visually-hidden">Previous</span>
 							 </button>
 							 <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
   								 <span class="carousel-control-next-icon" aria-hidden="true"></span>
  								  <span class="visually-hidden">Next</span>
  							</button>
			       		</div>
			       	</div>
           			 <div class ="col-3 bg-white">
						<?php
							$get_slider = $product -> show_slider();
							if($get_slider)
							{
								while($result_slider = $get_slider -> fetch_assoc())
								{
						?>
						<div style="margin-bottom: 10px;">
              			 <img src="admin/uploads/<?php echo $result_slider['hinhanh_km']?>" style="height: 120px; width: 310px;">
						   </div>
						<?php
								}
							}
						?>
           			 </div>
         		</div>
      	</div>
		<!--end-banner-->
		<!--banner-clone-->
		<div class="banner">
      		<img src="images/banner-dai.jpg" alt="" style="width: 1294px; margin-top:20px;">
      	</div>
		<!--end-banner-clone-->