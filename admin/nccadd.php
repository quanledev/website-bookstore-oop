<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php include '../classes/ncc.php';?>
<?php
$ncc = new ncc();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
    // $brandName = $_POST['brandName'];

    $insertNcc = $ncc->insert_ncc($_POST, $_FILES);

} 
if(isset($_GET['delid']))
{
    $id = $_GET['delid'];
    $delncc = $ncc->del_ncc($id);
}
?>
 <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Nhà cung cấp</h2>
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
                    <h3 class="fs-4 mb-3">Thêm nhà cung cấp</h3>
                    
                    <div class="col">

                        <table class="table bg-white rounded shadow-sm table-hover">
                        <form method="post" action="nccadd.php">
                             <tbody>
                                <tr>                                   
                                    <td>Tên nhà cung cấp</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="tenncc">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Tên người đại diện</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="nguoidaidien">
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
                                    <td><div class="d-grid gap-2 col-6 mx-auto"><button class="btn btn-success" type="submit" name="submit">Thêm nhà cung cấp</button></div></td>
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
                    <h3 class="fs-4 mb-3">Liệt kê nhà cung cấp</h3>
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
                                    <th scope="col">Nhà cung cấp</th>
                                    <th scope="col">Người đại diện</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $show_ncc = $ncc -> show_ncc();
                                    if($show_ncc)
                                    {
                                        $i = 0;
                                        while($result = $show_ncc->fetch_assoc()){
                                            $i++;
                                ?> 
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['tenncc']?></td>
                                    <td><?php echo $result['tennguoidaidien']?></td>
                                    <td><?php echo $result['sdt']?></td>
                                    <td><?php echo $result['email']?></td>
                                    <td><?php echo $result['diachi']?></td>
                                    <td><a href="nccedit.php?id_ncc=<?php echo $result['id_ncc']?>">Sửa</a> || 
                                    <a onclick = "return confirm('Bạn có muốn xóa nhà cung cấp này ?')" href="?delid=<?php echo $result['id_ncc']?>">Xóa</a></td>
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