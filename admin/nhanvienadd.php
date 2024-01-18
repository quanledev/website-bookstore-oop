<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php include '../classes/nhanvien.php';?>
<?php
$nhanvien = new nhanvien();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
    // $brandName = $_POST['brandName'];

    $insertNhanvien = $nhanvien->insert_nhanvien($_POST, $_FILES);

} 
if(isset($_GET['delid']))
{
    $id = $_GET['delid'];
    $delnhanvien = $nhanvien->del_nhanvien($id);
}
?>
 <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Nhân viên</h2>
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
                    <h3 class="fs-4 mb-3">Thêm nhân viên</h3>
                    
                    <div class="col">

                        <table class="table bg-white rounded shadow-sm table-hover">
                        <form method="post" action="nhanvienadd.php">
                             <tbody>
                                <tr>                                   
                                    <td>Tên nhân viên</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="tennhanvien">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Ngày sinh</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="ngaysinh">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Số điện thoại</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="sdt">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Email</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="email">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Địa chỉ</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="diachi">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td><div class="d-grid gap-2 col-6 mx-auto"><button class="btn btn-success" type="submit" name="submit">Thêm nhân viên</button></div></td>
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
                    <h3 class="fs-4 mb-3">Liệt kê nhân viên</h3>
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
                                    <th scope="col">Tên nhân viên</th>
                                    <th scope="col">Ngày sinh</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $show_nhanvien = $nhanvien -> show_nhanvien();
                                    if($show_nhanvien)
                                    {
                                        $i = 0;
                                        while($result = $show_nhanvien->fetch_assoc()){
                                            $i++;
                                ?> 
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['ten_nhanvien']?></td>
                                    <td><?php echo $result['ngaysinh']?></td>
                                    <td><?php echo $result['sdt']?></td>
                                    <td><?php echo $result['email']?></td>
                                    <td><?php echo $result['diachi']?></td>
                                    <td><a href="nhanvienedit.php?id_nhanvien=<?php echo $result['id_nhanvien']?>">Sửa</a> || 
                                    <a onclick = "return confirm('Bạn có muốn xóa nhân viên này ?')" href="?delid=<?php echo $result['id_nhanvien']?>">Xóa</a></td>
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