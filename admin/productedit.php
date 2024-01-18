<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include '../classes/brand.php';
include '../classes/category.php';
include '../classes/product.php';
?>
<?php
$pd = new product();
if(!isset($_GET['id_sp']) || $_GET['id_sp']!=NULL)
{
    $id = $_GET['id_sp'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
    $updateProduct = $pd->update_product($_POST,$_FILES,$id);
}
?>
<div class="container-fluid px-4">

<div class="row my-5">
    <h3 class="fs-4 mb-3">Sửa sản phẩm</h3>
    <div class="col">
    <?php
        if(isset($updateProduct))
        {
            echo $updateProduct;
        }
    ?>
    <?php
        $get_product_by_id = $pd -> getproductbyId($id);
            if($get_product_by_id)
            {
                while($result_product = $get_product_by_id->fetch_assoc()){
    ?>
        <table class="table bg-white rounded shadow-sm table-hover">
            <form method="POST" action="" enctype="multipart/form-data">
                             <tbody>
                                <tr>                                   
                                    <td>Tên sản phẩm</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="ten_sp" value="<?php echo $result_product['ten_sp']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Danh mục sản phẩm</td>
                                    <td>
                                    <select class="form-select" name="category">
                                            <?php
                                                $cat = new category();
                                                $catlist = $cat->show_category();
                                                if($catlist)
                                                {
                                                   while($result = $catlist->fetch_assoc()){
                                            ?>
                                                   <option 
                                                   <?php
                                                   if($result['id_loaisanpham'] == $result_product['id_loaisanpham']){ echo 'selected';}  
                                                   ?>
                                                    value="<?php echo $result['id_loaisanpham']?>"><?php echo $result['ten_loaisanpham']?>
                                                
                                                    </option>
                                            <?php
                                                   }
                                                }
                                            ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Loại sản phẩm</td>
                                    <td>
                                    <select class="form-select" aria-label="Default select example" name="brand">
                                            <?php
                                                $brand = new brand();
                                                $brandlist = $brand->show_brand();
                                                if($brandlist)
                                                {
                                                   while($result = $brandlist->fetch_assoc()){
                                            ?>
                                                   <option 
                                                   <?php
                                                   if($result['id_dongia'] == $result_product['id_dongia']){ echo 'selected';}  
                                                   ?>
                                                   value="<?php echo $result['id_dongia']?>"><?php echo $result['giaxuat']?></option>
                                            <?php
                                                   }
                                                }
                                            ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Tác giả</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="tacgia" value="<?php echo $result_product['tacgia']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Nhà xuất bản</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="nhaxuatban" value="<?php echo $result_product['nhaxuatban']?>">
                                     </div>
                                    </td>
                                </tr>
                                
                                <tr>                                   
                                    <td>Mô tả sản phẩm</td>
                                    <td>
                                    <div class="form-floating">
                                       <textarea class="form-control" name="product_desc" id="floatingTextarea2" style="height: 100px" ><?php echo $result_product['mota_sp']?></textarea>
                                    </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Giá sản phẩm</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="price" value="<?php echo $result_product['gia']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Số lượng</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="number" class="form-control" min="1" aria-describedby="basic-addon1" name="soluong" value="<?php echo $result_product['soluong']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Hình ảnh</td>
                                    <td>
                                    <img src="uploads/<?php echo $result_product['hinhanh']?>" width="150px">
                                     <div class="input-group">
                                         <input type="file" class="form-control" aria-describedby="basic-addon1" name="product_image">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Kiểu sản phẩm</td>
                                    <td>

                                    <select class="form-select" aria-label="Default select example" name="product_type">
                                        <?php
                                        if($result_product['product_type'] == 0){
                                        ?>
                                            <option value="1">Nổi bật</option>
                                            <option selected value="0">Không nổi bật</option>
                                        <?php
                                        }else{
                                        ?>
                                            <option selected value="1">Nổi bật</option>
                                            <option value="0">Không nổi bật</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td><div class="d-grid gap-2 col-6 mx-auto"><button class="btn btn-success" type="submit" name="submit">Sửa sản phẩm</button></div></td>
                                </tr>
                             </tbody>
                </form>
            </table>
            <?php
        }
    }
            ?>
    </div>
</div>
</div>
<?php include 'inc/footer.php'; ?>