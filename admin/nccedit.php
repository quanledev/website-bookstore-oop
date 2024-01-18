<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php include '../classes/ncc.php';?>
<?php
$ncc = new ncc();
if(!isset($_GET['id_ncc']) || $_GET['id_ncc']!=NULL)
{
    $id = $_GET['id_ncc'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
    // $brandName = $_POST['brandName'];

    $updateNcc = $ncc->update_ncc($_POST,$_FILES,$id);
}
?>
 <div id="page-content-wrapper">
           

            <div class="container-fluid px-4">
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Sửa nhà cung cấp</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <?php
                                if(isset($updateNcc))
                                {
                                    echo $updateNcc;
                                }
                            ?>
                            <?php
                               $get_ncc_name = $ncc ->getnccbyId($id);
                               if($get_ncc_name)
                               {
                                    while($result = $get_ncc_name->fetch_assoc())
                                    {
                               
                            ?>
                        <form method="post" action="">
                             <tbody>
                             <tr>                                   
                                    <td>Tên nhà cung cấp</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="tenncc" value="<?php echo $result['tenncc']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Tên người đại diện</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="nguoidaidien" value="<?php echo $result['tennguoidaidien']?>">
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
                                    <td><div class="d-grid gap-2 col-6 mx-auto"><button class="btn btn-success" type="submit" name="submit">Sửa nhà cung cấp</button></div></td>
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