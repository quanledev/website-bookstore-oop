<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include '../classes/brand.php';
include '../classes/category.php';
include '../classes/product.php'; 
?>
<?php
$pd = new product();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
    $insertProduct = $pd->insert_product($_POST,$_FILES); 
}
?>
<div class="container-fluid px-4">
<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Sản phẩm</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i></i><?php echo Session::get('adminName')?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="?action=logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
<div class="row my-5">
    <h3 class="fs-4 mb-3">Thêm sản phẩm</h3>
    <div class="col">
    <?php
        if(isset($insertProduct))
        {
            echo $insertProduct;
        }
    ?>
        <table class="table bg-white rounded shadow-sm table-hover">
            <form method="POST" action="productadd.php" enctype="multipart/form-data">
                             <tbody>
                                <tr>                                   
                                    <td>Tên sản phẩm</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="ten_sp">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Đơn giá</td>
                                    <td>
                                    <select class="form-select" aria-label="Default select example" name="brand">
                                            <?php
                                                $brand = new brand();
                                                $brandlist = $brand->show_brand();
                                                if($brandlist)
                                                {
                                                   while($result = $brandlist->fetch_assoc()){
                                            ?>
                                                   <option value="<?php echo $result['id_dongia']?>"><?php echo number_format(($result['giaxuat']),0,',','.').' đ'?></option>
                                            <?php
                                                   }
                                                }
                                            ?>
                                    </select>
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
                                                   <option value="<?php echo $result['id_loaisanpham']?>"><?php echo $result['ten_loaisanpham']?></option>
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
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="tacgia">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Nhà xuất bản</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="nhaxuatban">
                                     </div>
                                    </td>
                                </tr>
                                <!-- <tr>                                   
                                    <td>Nhà cung cấp</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="nhacungcap">
                                     </div>
                                    </td>
                                </tr> -->
                                <tr>                                   
                                    <td>Mô tả sản phẩm</td>
                                    <td>
                                    <div class="form-floating">
                                       <textarea class="form-control" name="mota_sp" id="floatingTextarea2" style="height: 100px"></textarea>
                                    </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Giá sản phẩm</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="gia">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Số lượng</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="number" class="form-control" min="1" value="20" aria-describedby="basic-addon1" name="soluong">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Hình ảnh</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="file" class="form-control" aria-describedby="basic-addon1" name="hinhanh">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Kiểu sản phẩm</td>
                                    <td>
                                    <select class="form-select" aria-label="Default select example" name="product_type">
                                            <option value="1">Nổi bật</option>
                                            <option value="0">Không nổi bật</option>
                                    </select>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td><div class="d-grid gap-2 col-6 mx-auto"><button class="btn btn-success" type="submit" name="submit">Thêm sản phẩm</button></div></td>
                                </tr>
                             </tbody>
                </form>
            </table>
    </div>
</div>
</div>
<?php include 'inc/footer.php'; ?>