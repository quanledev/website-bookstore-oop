<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php include '../classes/brand.php';?>
<?php
$brand = new brand();
if(!isset($_GET['id_dongia']) || $_GET['id_dongia']!=NULL)
{
    $id = $_GET['id_dongia'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
    // $brandName = $_POST['brandName'];

    $updateBrand = $brand->update_brand($_POST,$_FILES,$id);
}
?>
 <div id="page-content-wrapper">
           

            <div class="container-fluid px-4">
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Sửa đơn giá</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <?php
                                if(isset($updateBrand))
                                {
                                    echo $updateBrand;
                                }
                            ?>
                            <?php
                               $get_brand_name = $brand ->getbrandbyId($id);
                               if($get_brand_name)
                               {
                                    while($result = $get_brand_name->fetch_assoc())
                                    {
                               
                            ?>
                        <form method="post" action="">
                             <tbody>
                             <tr>                                   
                                    <td>Ngày bắt đầu</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="ngaybatdau" value="<?php echo $result['ngaybatdau']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Ngày kết thúc</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="ngayketthuc" value="<?php echo $result['ngayketthuc']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Giá nhập</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="gianhap" value="<?php echo $result['gianhap']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Giá xuất</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="giaxuat" value="<?php echo $result['giaxuat']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>CTKM</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="ctkm" value="<?php echo $result['ctkm']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Người lập</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="nguoilap" value="<?php echo $result['nguoilap']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Ghi chú</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="ghichu" value="<?php echo $result['ghichu']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td><div class="d-grid gap-2 col-6 mx-auto"><button class="btn btn-success" type="submit" name="submit">Sửa đơn giá</button></div></td>
                                </tr>
                             </tbody>
                            </form>
                            <?php 
                                    }
                                }
                            ?>
                        </table>
                    </div>
            </div>
        </div>
    </div>