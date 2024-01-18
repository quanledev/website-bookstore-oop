<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include '../classes/brand.php';
include '../classes/category.php';
include '../classes/product.php';
include_once '../helpers/format.php';
$fm = new Format();
$pd = new product();
if(isset($_GET['id_sp']))
{
    $id = $_GET['id_sp'];
    $delpro = $pd->del_product($id);
}
?>

<div class="container-fluid px-4">
<div class="row my-5">
<h3 class="fs-4 mb-3">Liệt kê sản phẩm</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    
                                    $pdlist = $pd->show_product();
                                    if($pdlist){
                                        $i = 0;
                                        while($result = $pdlist->fetch_assoc())
                                        {
                                            $i++;
                                ?>
                            <tr>
                                    <td><?php echo $i?></td>
                                    <td><?php echo $result['ten_sp'] ?></td>
                                    <td><?php echo number_format(($result['gia']),0,',','.').' đ'?></td>
                                    <td><img src="uploads/<?php echo $result['hinhanh']?>" width="150px"></td>
                                    <td><?php echo $result['ten_loaisanpham'] ?></td>
                                    <td>
                                        <?php
                                            echo $fm ->textShorten($result['mota_sp'], 20);
                                        ?>
                                    </td>
                                    <!-- <td><?php 
                                    if($result['product_type']==0)
                                    {
                                        echo 'Không nổi bật';
                                    }
                                    else
                                    {
                                        echo 'Nổi bật';
                                    }
                                    ?></td> -->
                                    <td>
                                        <a href="?id_sp=<?php echo $result['id_sp']?>">Xóa</a> ||
                                        <a href="productedit.php?id_sp=<?php echo $result['id_sp']?>">Sửa</a>
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