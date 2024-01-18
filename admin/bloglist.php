<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include '../classes/post.php';
include '../classes/blog.php';
include_once '../helpers/format.php';
$fm = new Format();
$blog = new blog();
if(isset($_GET['id_tintuc']))
{
    $id = $_GET['id_tintuc'];
    $delblog = $blog->del_blog($id);
}
?>

<div class="container-fluid px-4">
<div class="row my-5">
<h3 class="fs-4 mb-3">Liệt kê tin tức</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Loại tin tức</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    
                                    $bloglist = $blog->show_blog();
                                    if($bloglist){
                                        $i = 0;
                                        while($result = $bloglist->fetch_assoc())
                                        {
                                            $i++;
                                ?>
                            <tr>
                                    <td><?php echo $i?></td>
                                    <td><?php echo $result['tieude'] ?></td>
                                    <td><?php echo $result['tenloaitt']?></td>
                                    <td><img src="uploads/<?php echo $result['hinhanh']?>" width="150px"></td>
                                
                                    <td><?php 
                                    if($result['status']=='0')
                                    {
                                        echo 'Đang hiển thị';
                                    }
                                    else
                                    {
                                        echo 'Đã ẩn';
                                    }
                                    ?></td>
                                    <td>
                                        <a href="?id_tintuc=<?php echo $result['id_tintuc']?>">Xóa</a> ||
                                        <a href="blogedit.php?id_tintuc=<?php echo $result['id_tintuc']?>">Sửa</a>
                                    </td>
                                    <?php
                                    }
                                }
                                    ?>
                                </tr>
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>