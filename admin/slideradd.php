<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include '../classes/brand.php';
include '../classes/category.php';
include '../classes/product.php';
?>
<?php
$product = new product();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
    $insertSlider = $product->insert_slider($_POST,$_FILES); 
}
if(isset($_GET['type_slider']) && isset($_GET['type']))
{
    $id = $_GET['type_slider'];
    $type = $_GET['type'];
    $update_type_slider = $product->update_type_slider($id, $type); 
}
if(isset($_GET['del_slider']))
{
    $id = $_GET['del_slider'];
    $del_slider = $product->del_slider($id);  
}
?>
<div class="container-fluid px-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Chương Trình Khuyến Mãi</h2>
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
    <h3 class="fs-4 mb-3">Thêm khuyến mãi</h3>
    <div class="col">
    <?php
        if(isset($insertSlider))
        {
            echo $insertSlider;
        }
    ?>
        <table class="table bg-white rounded shadow-sm table-hover">
            <form method="POST" action="slideradd.php" enctype="multipart/form-data">
                             <tbody>
                                <tr>                                   
                                    <td>Tên khuyến mãi</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="sliderName">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Ngày bắt đầu</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="ngaybatdau">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Ngày kết thúc</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="ngayketthuc">
                                     </div>
                                    </td>
                                </tr>
                                <!-- <tr>                                   
                                    <td>Chi tiết khuyến mãi</td>
                                    <td>
                                    <div class="form-floating">
                                       <textarea class="form-control" name="chitiet_km" id="floatingTextarea2" style="height: 100px"></textarea>
                                    </div>
                                    </td>
                                </tr> -->
                                <tr>                                   
                                    <td>Hình ảnh Banner</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="file" class="form-control" aria-describedby="basic-addon1" name="hinhanh">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Tùy Chỉnh</td>
                                    <td>
                                    <select class="form-select" aria-label="Default select example" name="type">
                                            <option value="1">Bật</option>
                                            <option value="0">Tắt</option>
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
<div class="col">
<h3 class="fs-4 mb-3">Liệt kê khuyến mãi</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên khuyến mãi</th>
                                    <th scope="col">Ngày bắt đầu</th>
                                    <th scope="col">Ngày kết thúc</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tùy chỉnh</th>
                                    <th scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $get_slider = $product ->show_slider_list();
                                    if($get_slider)
                                    {
                                        $i = 0;
                                        while($result = $get_slider->fetch_assoc()){
                                            $i++;
                                    
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['tenkhuyenmai']?></td>
                                    <td><?php echo $result['ngaybatdau']?></td>
                                    <td><?php echo $result['ngayketthuc']?></td>
                                    <td><img src="uploads/<?php echo $result['hinhanh_km']?>" width="150px"></td>
                                    <td>
                                    <?php 
                                    if($result['type']==1){
                                    ?>
                                    <a href="?type_slider=<?php echo $result['id_khuyenmai']?>&type=0">Off</a>
                                    <?php
                                    }else{
                                    ?>
                                    <a href="?type_slider=<?php echo $result['id_khuyenmai']?>&type=1">On</a> 
                                    <?php
                                    }
                                    ?>  
                                    </td>
                                    <td> 
                                    <a onclick = "return confirm('Bạn có muốn xóa khuyến mãi này ?')" href="?del_slider=<?php echo $result['id_khuyenmai']?>">Xóa</a>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>    
                </div>
                </div>
</div>
<?php include 'inc/footer.php'; ?>