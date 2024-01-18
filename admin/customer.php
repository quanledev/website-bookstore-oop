<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/customer.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php include '../classes/category.php';?>
<?php
$cat = new category();
if(!isset($_GET['customerid']) || $_GET['customerid']!=NULL)
{
    $id = $_GET['customerid'];
}
$cs = new customer();
// if($_SERVER['REQUEST_METHOD'] == 'POST')
// {
//     $catName = $_POST['catName'];

//     $updateCat = $cat->update_category($catName,$id);
// }
?>
 <div id="page-content-wrapper">
            <div class="container-fluid px-4">
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Thông tin khách đặt mua</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <?php
                               $get_customer = $cs ->show_customers($id);
                               if($get_customer)
                               {
                                    while($result = $get_customer->fetch_assoc())
                                    {
                               
                            ?>
                        <form method="post" action="">
                        <tr>
					        <th>Họ và Tên: </th>
					        <td><?php echo $result['tenkhachhang']?></td>
				        </tr>
                        <tr>
					        <th>Email: </th>
					        <td><?php echo $result['email']?></td>
				        </tr>
				        <tr>
					        <th>Số điện thoại: </th>
					        <td><?php echo $result['sdt']?></td>
				        </tr>
                        <tr>
					        <th>Thành phố: </th>
					        <td><?php echo $result['thanhpho']?></td>
				        </tr>
				        <tr>
					        <th>Địa chỉ: </th>
					        <td><?php echo $result['diachi']?></td>
                        </tr>
                            </form>
                            <?php 
                                    }
                                }
                            ?>
                        <tr>
                            <td><a href="admin.php" style="text-decoration: none;"><div class="d-grid gap-2 col-6 mx-auto"><button class="btn btn-success">Quay về trang chủ</button></div></a></td>
                        </tr>
                        </table>
                    </div>
            </div>
        </div>
    </div>