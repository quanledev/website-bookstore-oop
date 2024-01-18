<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>admin</div>
            <div class="list-group list-group-flush my-3">
                <a href="admin.php" class="list-group-item list-group-item-action bg-transparent second-text active">Quản Lý Đơn Hàng</a>

                <a href="brandadd.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Quản Lý Đơn Giá</a>
                        
                <a href="danhmucsanpham.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Danh Mục Sản Phẩm</a>
                <a href="productadd.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Quản lý Sản Phẩm</a>
                <a href="productlist.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Liệt Kê Sản Phẩm</a>

                <a href="postadd.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Danh Mục Tin Tức</a>
                <a href="blogadd.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Quản Lý Tin Tức</a>
                <a href="bloglist.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Liệt Kê Tin Tức</a>

                <a href="slideradd.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Quản Lý Khuyến Mãi</a>

                <a href="nhanvienadd.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Quản Lý Nhân Viên</a>
                        
                <a href="nccadd.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Quản Lý Nhà Cung Cấp</a>
				<?php
                	if(isset($_GET['action']) && $_GET['action'] == 'logout')
               		{
                    	Session::destroy();
                	}
            	?>
                <a href="?action=logout" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Đăng Xuất Admin</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->