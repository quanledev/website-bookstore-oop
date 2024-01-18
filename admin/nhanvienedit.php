<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php include '../classes/nhanvien.php';?>
<?php
$nhanvien = new nhanvien();
if(!isset($_GET['id_nhanvien']) || $_GET['id_nhanvien']!=NULL)
{
    $id = $_GET['id_nhanvien'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
    // $brandName = $_POST['brandName'];

    $updateNhanvien = $nhanvien->update_nhanvien($_POST,$_FILES,$id);
}
?>
 <div id="page-content-wrapper">
           

            <div class="container-fluid px-4">
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Sửa nhân viên</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <?php
                                if(isset($updateNhanvien))
                                {
                                    echo $updateNhanvien;
                                }
                            ?>
                            <?php
                               $get_nhanvien_name = $nhanvien ->getnhanvienbyId($id);
                               if($get_nhanvien_name)
                               {
                                    while($result = $get_nhanvien_name->fetch_assoc())
                                    {
                               
                            ?>
                        <form method="post" action="">
                             <tbody>
                             <tr>                                   
                                    <td>Tên nhân viên</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="tennhanvien" value="<?php echo $result['ten_nhanvien']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Ngày sinh</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="ngaysinh" value="<?php echo $result['ngaysinh']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Số điện thoại</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="sdt" value="<?php echo $result['sdt']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Email</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="email" value="<?php echo $result['email']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Địa chỉ</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="diachi" value="<?php echo $result['diachi']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td><div class="d-grid gap-2 col-6 mx-auto"><button class="btn btn-success" type="submit" name="submit">Sửa nhân viên</button></div></td>
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