<?php
include 'inc/header.php';
?>
<div class="main" style="margin-top: 40px;">
    <div class= "container-fluid">
   			<div class="box-title_title bg-light text-center" >
   				<h2><img src="" style="height:30px;"><strong>Tin Tức Mới Nhất</strong></h2>
   			</div>
            <div class="row row-cols-1 row-cols-md-2 g-4">
			<?php
				$blog_feathered = $blog -> getblog_feathered(); 
				if($blog_feathered){
				while($result = $blog_feathered->fetch_assoc()){
			?>
			<!--Tin tức-->
            <div class="col">
            <div class="card">
                <div style="margin-top: 15px; margin-left: 18px;">
                <img src="admin/uploads/<?php echo $result['hinhanh']?>" class="card-img-top" style="width: 480px; height:270px;"alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $result['tieude']?></h5>
                    <p class="card-text"><?php echo $result['mota']?></p>
                    <a href="detailsblog.php?blogId=<?php echo $result['id_tintuc']?>"><button type="button" class="btn btn-danger">Xem tin tức</button></a>
                </div>
            </div>
            
        </div>
  
			<?php
					}
				}
			?>		
		</div>	 
    					  <hr style="margin-top: 15px;">
    </div>
</div>
<?php
include 'inc/footer.php';
?>