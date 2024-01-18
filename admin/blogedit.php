<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include '../classes/post.php';
include '../classes/blog.php';
include_once '../helpers/format.php';
?>
<?php
$blog = new blog();
if(!isset($_GET['id_tintuc']) || $_GET['id_tintuc']!=NULL)
{
    $id = $_GET['id_tintuc'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
    $updateBlog = $blog->update_blog($_POST,$_FILES,$id);
}
?>
<div class="container-fluid px-4">

<div class="row my-5">
    <h3 class="fs-4 mb-3">Sửa tin tức</h3>
    <div class="col">
    <?php
        if(isset($updateBlog))
        {
            echo $updateBlog;
        }
    ?>
    <?php
        $get_blog_by_id = $blog -> getblogbyId($id);
            if($get_blog_by_id)
            {
                while($result_blog = $get_blog_by_id->fetch_assoc()){
    ?>
        <table class="table bg-white rounded shadow-sm table-hover">
            <form method="POST" action="" enctype="multipart/form-data">
                             <tbody>
                                <tr>                                   
                                    <td>Tiêu đề</td>
                                    <td>
                                     <div class="input-group">
                                         <input type="text" class="form-control" aria-describedby="basic-addon1" name="title" value="<?php echo $result_blog['tieude']?>">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Danh mục tin tức</td>
                                    <td>
                                    <select class="form-select" name="category_post">
                                            <?php
                                                $post = new post();
                                                $catlist = $post->show_post();
                                                if($catlist)
                                                {
                                                   while($result = $catlist->fetch_assoc()){
                                            ?>
                                                   <option 
                                                   <?php
                                                   if($result['id_loaitintuc'] == $result_blog['id_loaitintuc']){ echo 'selected';}  
                                                   ?>
                                                    value="<?php echo $result['id_loaitintuc']?>"><?php echo $result['tenloaitt']?>
                                                
                                                    </option>
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
                                    <div class="form-floating">
                                       <textarea class="form-control" name="mota" id="floatingTextarea2" style="height: 100px" ><?php echo $result_blog['mota']?></textarea>
                                    </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Nội dung</td>
                                    <td>
                                    <div class="form-floating">
                                       <textarea class="form-control" name="desc" id="floatingTextarea2" style="height: 100px" ><?php echo $result_blog['noidung']?></textarea>
                                    </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Hình ảnh</td>
                                    <td>
                                    <img src="uploads/<?php echo $result_blog['hinhanh']?>" width="150px">
                                     <div class="input-group">
                                         <input type="file" class="form-control" aria-describedby="basic-addon1" name="image">
                                     </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>Trạng thái tin tức</td>
                                    <td>

                                    <select class="form-select" aria-label="Default select example" name="type">
                                        <?php
                                        if($result_blog['status'] == 0){
                                        ?>
                                            <option selected value="0">Đang hiển thị</option>
                                            <option value="1">Đã ẩn</option>
                                        <?php
                                        }else{
                                        ?>
                                            <option value="0">Đang hiển thị</option>
                                            <option selected value="1">Đã ẩn</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td colspan="2"><div class="d-grid gap-2 col-6 mx-auto"><button class="btn btn-success" type="submit" name="submit">Sửa tin tức</button></div></td>
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