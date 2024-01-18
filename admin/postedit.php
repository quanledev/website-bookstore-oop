<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php include '../classes/post.php';?>
<?php
$post = new post();
if(!isset($_GET['id_loaitintuc']) || $_GET['id_loaitintuc']!=NULL)
{
    $id = $_GET['id_loaitintuc'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $catName = $_POST['catName'];
    $catDesc = $_POST['catDesc'];
    $catStatus = $_POST['catStatus'];
    $updateCat = $post->update_category_post($catName, $catDesc, $catStatus, $id);
}
?>
 <div id="page-content-wrapper">
           

            <div class="container-fluid px-4">
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Sửa danh mục tin tức</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <?php
                                if(isset($updateCat))
                                {
                                    echo $updateCat;
                                }
                            ?>
                            <?php
                               $get_cate_name = $post ->getcatpostbyId($id);
                               if($get_cate_name)
                               {
                                    while($result = $get_cate_name->fetch_assoc())
                                    {
                               
                            ?>
                        <form method="post" action="">
                             <tbody>
                                <tr>                                   
                                    <td>Tên danh mục tin tức</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="catName" value="<?php echo $result['tenloaitt']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Mô tả tin tức</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="catDesc" value="<?php echo $result['mota']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Trạng thái</td>
                                    <td>
                                         <select name="catStatus">
                                            <?php
                                            if($result['status'] == '0'){
                                            ?>
                                            <option selected value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                            <?php
                                            }else{
                                            ?>
                                            <option value="0">Hiển thị</option>
                                            <option selected value="1">Ẩn</option>
                                            <?php
                                            }
                                            ?>
                                         </select>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td><div class="d-grid gap-2 col-6 mx-auto"><button class="btn btn-success" type="submit" name="">Sửa danh mục tin tức</button></div></td>
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