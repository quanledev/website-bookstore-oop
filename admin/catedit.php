<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php include '../classes/category.php';?>
<?php
$cat = new category();
if(!isset($_GET['id_loaisanpham']) || $_GET['id_loaisanpham']!=NULL)
{
    $id = $_GET['id_loaisanpham'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $catName = $_POST['ten_loaisanpham'];

    $updateCat = $cat->update_category($catName,$id);
}
?>
 <div id="page-content-wrapper">
           

            <div class="container-fluid px-4">
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Sửa danh mục sản phẩm</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <?php
                                if(isset($updateCat))
                                {
                                    echo $updateCat;
                                }
                            ?>
                            <?php
                               $get_cate_name = $cat ->getcatbyId($id);
                               if($get_cate_name)
                               {
                                    while($result = $get_cate_name->fetch_assoc())
                                    {
                               
                            ?>
                        <form method="post" action="">
                             <tbody>
                                <tr>                                   
                                    <td>Tên danh mục</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="ten_loaisanpham" value="<?php echo $result['ten_loaisanpham']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td><div class="d-grid gap-2 col-6 mx-auto"><button class="btn btn-success" type="submit" name="">Sửa danh mục sản phẩm</button></div></td>
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