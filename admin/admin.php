<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/cart.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    $ct = new cart();
    if(isset($_GET['shiftid'])){
        $id = $_GET['shiftid'];
        $time = $_GET['time'];
        $price = $_GET['price'];
        $shiftid = $ct-> shiftid($id,$time,$price);
    }
    if(isset($_GET['delid'])){
        $id = $_GET['delid'];
        $time = $_GET['time'];
        $price = $_GET['price'];
        $del_shiftid = $ct->del_shiftid($id,$time,$price);
    }
?>
     <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Quản lý đơn hàng</h2>
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
                                <i class="fas fa-user me-2"></i><?php echo Session::get('adminName')?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Hồ sơ</a></li>
                                <li><a class="dropdown-item" href="#">Thiết lập</a></li>
                                <li><a class="dropdown-item" href="?action=logout">Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">720</h3>
                                <p class="fs-5">Sản phẩm</p>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">4920</h3>
                                <p class="fs-5">Lợi nhuận</p>
                            </div>
                            <i
                                class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">3899</h3>
                                <p class="fs-5">Vận chuyển</p>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">%25</h3>
                                <p class="fs-5">Tăng</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Đơn hàng khách đặt</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Thời gian</th>
                                    <th scope="col">Sách</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">ID Khách hàng</th>
                                    <th scope="col">Khách hàng</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    
                                    $ct = new cart();
                                    $fm = new Format();
                                    $get_inbox_cart = $ct -> get_inbox_cart(); 
                                    if($get_inbox_cart){
                                        $i = 0;
                                        while($result = $get_inbox_cart->fetch_assoc()){
                                            $i++;
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i?></th>
                                    <td><?php echo $result['ngaylap_hdx']?></td>
                                    <td><?php echo $result['ten_sp']?></td>
                                    <td><?php echo $result['soluong']?></td>
                                    <td><?php echo number_format(($result['gia']),0,',','.').' đ'?></td>
                                    <td class="text-center"><?php echo $result['id_khachhang']?></td>
                                    <td><a href="customer.php?customerid=<?php echo $result['id_khachhang']?>">Xem thông tin</a></td>
                                    <td>
                                    <?php 
                                        if($result['status']=='0'){
                                    ?>

                                    <a href="?shiftid=<?php echo $result['id_hdx']?>&price=<?php echo $result['gia']?>&time=<?php echo $result['ngaylap_hdx']?>">Đang xử lý</a>
                                    
                                    <?php
                                        }elseif($result['status']=='1'){
                                    ?>
                                    <?php echo 'Đang vận chuyển...'?>
                                    <?php
                                        }else{
                                    ?>
                                    <a href="?delid=<?php echo $result['id_hdx']?>&price=<?php echo $result['gia']?>&time=<?php echo $result['ngaylap_hdx']?>">Xóa</a>  
                                    <?php  
                                        }   
                                        
                                    ?>
                                    </td>
                                </tr>
                                <?php
                                     }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <?php
    include 'inc/footer.php';
    ?>
</body>

</html>