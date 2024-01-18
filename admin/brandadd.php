<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php include '../classes/brand.php';?>
<?php
$brand = new brand();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
    // $brandName = $_POST['brandName'];

    $insertBrand = $brand->insert_brand($_POST, $_FILES);

} 
if(isset($_GET['delid']))
{
    $id = $_GET['delid'];
    $delbrand = $brand->del_brand($id);
}
?>
 <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Đơn giá</h2>
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

            <div class="container-fluid px-4">
                

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Thêm đơn giá</h3>
                    
                    <div class="col">

                        <table class="table bg-white rounded shadow-sm table-hover">
                        <form method="post" action="brandadd.php">
                             <tbody>
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
                                <tr>                                   
                                    <td>Giá nhập</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="gianhap">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Giá xuất</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="giaxuat">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>CTKM</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="ctkm">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Người lập</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="nguoilap">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Ghi chú</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="ghichu">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td><div class="d-grid gap-2 col-6 mx-auto"><button class="btn btn-success" type="submit" name="submit">Thêm đơn giá</button></div></td>
                                </tr>
                                <!-- <?php
                                    //  if(isset($delcat))
                                    //  {
                                    //     echo $delcat;
                                    //  }
                                ?> -->
                             </tbody>
                            </form>
                        </table>
                    </div>
                    <h3 class="fs-4 mb-3">Liệt kê đơn giá</h3>
                    <div class="col">
                                <!-- <?php
                                    //  if(isset($insertCat))
                                    //  {
                                    //     echo $insertCat;
                                    //  }
                                ?> -->
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Ngày bắt đầu</th>
                                    <th scope="col">Ngày kết thúc</th>
                                    <th scope="col">Giá nhập</th>
                                    <th scope="col">Giá xuất</th>
                                    <th scope="col">CTKM</th>
                                    <th scope="col">Người lập</th>
                                    <th scope="col">Ghi chú</th>
                                    <th scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $show_brand = $brand -> show_brand();
                                    if($show_brand)
                                    {
                                        $i = 0;
                                        while($result = $show_brand->fetch_assoc()){
                                            $i++;
                                ?> 
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['ngaybatdau']?></td>
                                    <td><?php echo $result['ngayketthuc']?></td>
                                    <td><?php echo number_format(($result['gianhap']),0,',','.').' đ'?></td>
                                    <td><?php echo number_format(($result['giaxuat']),0,',','.').' đ'?></td>
                                    <td><?php echo $result['ctkm']?></td>
                                    <td><?php echo $result['nguoilap']?></td>
                                    <td><?php echo $result['ghichu']?></td>
                                    <td><a href="brandedit.php?id_dongia=<?php echo $result['id_dongia']?>">Sửa</a> || 
                                    <a onclick = "return confirm('Bạn có muốn xóa loại sản phẩm này ?')" href="?delid=<?php echo $result['id_dongia']?>">Xóa</a></td>
                                </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>    
                </div>

            </div>
        </div>
    </div>