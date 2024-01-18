<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include '../classes/post.php';
include '../classes/blog.php';
?>
<?php
$blog = new blog();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
    $insertBlog = $blog->insert_blog($_POST,$_FILES); 
}
?>
<div class="container-fluid px-4">
<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Tin tức</h2>
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
    <h3 class="fs-4 mb-3">Thêm tin tức</h3>
    <div class="col">
    <?php
        if(isset($insertBlog))
        {
            echo $insertBlog;
        }
    ?>
        <table class="table bg-white rounded shadow-sm table-hover">
            <form method="POST" action="blogadd.php" enctype="multipart/form-data">
                             <tbody>
                                <tr>                                   
                                    <td>Tiêu đề tin tức</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="title">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Loại tin tức</td>
                                    <td>
                                    <select id="select" class="form-select" aria-label="Default select example" name="category_post">
                                            <?php
                                                $post = new post();
                                                $catlist = $post->show_post();
                                                if($catlist)
                                                {
                                                   while($result = $catlist->fetch_assoc()){
                                            ?>
                                                   <option value="<?php echo $result['id_loaitintuc']?>"><?php echo $result['tenloaitt']?></option>
                                            <?php
                                                   }
                                                }
                                            ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Mô tả</td>
                                    <td>
                                     <div class="input-group">
                                         <textarea type="text" class="form-control" aria-describedby="basic-addon1" name="mota"></textarea>
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Nội dung</td>
                                    <td>
                                     <div class="input-group">
                                         <textarea type="text" class="form-control" aria-describedby="basic-addon1" name="desc"></textarea>
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Hình ảnh</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="file" class="form-control" aria-describedby="basic-addon1" name="image">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Trạng thái tin tức</td>
                                    <td>
                                    <select id="select" class="form-select" aria-label="Default select example" name="type">
                                            <option value="0">Đang hiển thị</option>
                                            <option value="1">Đã ẩn</option>
                                    </select>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td colspan="2"><div class="d-grid gap-2 col-6 mx-auto"><button class="btn btn-success" type="submit" name="submit">Thêm tin tức</button></div></td>
                                </tr>
                             </tbody>
                </form>
            </table>
    </div>
</div>
</div>
<?php include 'inc/footer.php'; ?>