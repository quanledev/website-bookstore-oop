<?php
include 'inc/header.php';
?>
<?php
if(!isset($_GET['blogId']) || $_GET['blogId']!=NULL)
{
    $id = $_GET['blogId'];
}
// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
// {
// 	$quantity = $_POST['quantity']; 
//     $AddtoCart = $ct->add_to_cart($quantity,$id);
// }
?>
<hr style="margin-top: 30px;">
<div class="main">
	<div class= "row">
			<div class="box-title_title bg-light" >
   				<h2><img src="" style="height:30px;"><strong>Chi Tiết Tin Tức</strong></h2> 
   			</div>
	</div>
	<?php
		$get_blog_details = $blog -> get_blog_details($id);
		if($get_blog_details){
			while($result_details = $get_blog_details->fetch_assoc()){
	?>
	<div class="card mb-3" style="max-width: 1400px; margin-top: 25px">
        <img src="admin/uploads/<?php echo $result_details['hinhanh']?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $result_details['tieude']?></h5>
            <p class="card-text" style="text-align: justify;"><?php echo $result_details['noidung']?></p>
            <p class="card-text"><small class="text-body-secondary">Danh mục tin tức: <?php echo $result_details['tenloaitt']?></small></p>
            <a href="blog.php"><button type="button" class="btn btn-danger">Quay về</button></a>
        </div>
	</div>
	<?php
			}
		}
	?>
</div>
<hr style="margin-top: 40px;">
<?php
include 'inc/footer.php';
?>