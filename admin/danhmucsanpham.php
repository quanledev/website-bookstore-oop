<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php include '../classes/category.php';?>
<?php
$cat = new category();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $catName = $_POST['catName'];

    $insertCat = $cat->insert_category($catName);
}
if(isset($_GET['delid']))
{
    $id = $_GET['delid'];
    $delcat = $cat->del_category($id);
}
?>
 <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Danh mục sản phẩm</h2>
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
                    <h3 class="fs-4 mb-3">Thêm danh mục sản phẩm</h3>
                    
                    <div class="col">

                        <table class="table bg-white rounded shadow-sm table-hover">
                        <form method="post" action="danhmucsanpham.php">
                             <tbody>
                                <tr>                                   
                                    <td>Tên danh mục</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="catName">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td><div class="d-grid gap-2 col-6 mx-auto"><button class="btn btn-success" type="submit" name="">Thêm danh mục sản phẩm</button></div></td>
                                </tr>
                                <?php
                                     if(isset($delcat))
                                     {
                                        echo $delcat;
                                     }
                                ?>
                             </tbody>
                            </form>
                        </table>
                    </div>
                    <h3 class="fs-4 mb-3">Liệt kê danh mục sản phẩm</h3>
                    <div class="col">
                                <?php
                                     if(isset($insertCat))
                                     {
                                        echo $insertCat;
                                     }
                                ?>
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Quản Lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $show_cate = $cat ->show_category();
                                    if($show_cate)
                                    {
                                        $i = 0;
                                        while($result = $show_cate->fetch_assoc()){
                                            $i++;
                                    
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['ten_loaisanpham']?></td>
                                    <td><a href="catedit.php?id_loaisanpham=<?php echo $result['id_loaisanpham']?>">Sửa</a> || 
                                    <a onclick = "return confirm('Bạn có muốn xóa danh mục sản phẩm này ?')" href="?delid=<?php echo $result['id_loaisanpham']?>">Xóa</a></td>
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