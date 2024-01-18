<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php

    class product
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_product($data,$files)
        {
            // $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            // $category = mysqli_real_escape_string($this->db->link, $data['category']);
            // $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            // $tacgia = mysqli_real_escape_string($this->db->link, $data['tacgia']);
            // $nhaxuatban = mysqli_real_escape_string($this->db->link, $data['nhaxuatban']);
            // $nhacungcap = mysqli_real_escape_string($this->db->link, $data['nhacungcap']);
            // $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            // $price = mysqli_real_escape_string($this->db->link, $data['price']);
            // $soluong = mysqli_real_escape_string($this->db->link, $data['soluong']);
            // $product_type = mysqli_real_escape_string($this->db->link, $data['product_type']);

            $productName = mysqli_real_escape_string($this->db->link, $data['ten_sp']); 
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $tacgia = mysqli_real_escape_string($this->db->link, $data['tacgia']);
            $nhaxuatban = mysqli_real_escape_string($this->db->link, $data['nhaxuatban']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['mota_sp']);
            $price = mysqli_real_escape_string($this->db->link, $data['gia']);
            $soluong = mysqli_real_escape_string($this->db->link, $data['soluong']);
            $product_type = mysqli_real_escape_string($this->db->link, $data['product_type']);

            //check-image
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['hinhanh']['name']; 
            $file_size = $_FILES['hinhanh']['size'];
            $file_temp = $_FILES['hinhanh']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div)); 
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/". $unique_image;
            //end-check-image
            if (empty($productName) || empty($brand) || empty($category) || empty($tacgia) || empty($nhaxuatban) || empty($product_desc) || empty($price) || empty($soluong) || empty($product_type) || empty($file_name)) {
                $alert = "Các trường không được phép bỏ trống";
                return $alert;
            }
            
            else
            {
                move_uploaded_file($file_temp, $uploaded_image );
                $query = "INSERT INTO sanpham(ten_sp, id_dongia, id_loaisanpham, tacgia, nhaxuatban, mota_sp, gia, soluong, product_type, hinhanh) 
                VALUES('$productName','$brand', '$category','$tacgia','$nhaxuatban','$product_desc','$price','$soluong','$product_type ','$unique_image')";
                $result = $this->db->insert($query);
                if($result)
                {
                    $alert = "<span>Thêm sản phẩm thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Thêm sản phẩm không thành công</span>";
                    return $alert;
                }
                
            }
        }
        public function show_product()
        {
            //$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId ORDER BY tbl_product.productId DESC";
            $query = "SELECT sanpham.*, loaisanpham.ten_loaisanpham, dongia.giaxuat FROM sanpham INNER JOIN loaisanpham ON sanpham.id_loaisanpham = loaisanpham.id_loaisanpham INNER JOIN dongia ON sanpham.id_dongia = dongia.id_dongia ORDER BY sanpham.id_sp DESC";
            // $query = "SELECT * FROM tbl_product ORDER BY productId DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function search_product($tukhoa)
        {
            $tukhoa = $this->fm->validation($tukhoa);
            $query = "SELECT * FROM sanpham WHERE ten_sp LIKE '%$tukhoa%'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_product($data,$files,$id)
        {
            // $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            // $category = mysqli_real_escape_string($this->db->link, $data['category']);
            // $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            // $tacgia = mysqli_real_escape_string($this->db->link, $data['tacgia']);
            // $nhaxuatban = mysqli_real_escape_string($this->db->link, $data['nhaxuatban']);
            // $nhacungcap = mysqli_real_escape_string($this->db->link, $data['nhacungcap']);
            // $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            // $price = mysqli_real_escape_string($this->db->link, $data['price']);
            // $soluong = mysqli_real_escape_string($this->db->link, $data['soluong']);
            // $product_type = mysqli_real_escape_string($this->db->link, $data['product_type']);

            $productName = mysqli_real_escape_string($this->db->link, $data['ten_sp']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $tacgia = mysqli_real_escape_string($this->db->link, $data['tacgia']);
            $nhaxuatban = mysqli_real_escape_string($this->db->link, $data['nhaxuatban']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $soluong = mysqli_real_escape_string($this->db->link, $data['soluong']);
            $product_type = mysqli_real_escape_string($this->db->link, $data['product_type']);

            //check-image
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['product_image']['name']; 
            $file_size = $_FILES['product_image']['size'];
            $file_temp = $_FILES['product_image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div)); 
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/". $unique_image;
            
            if (empty($productName) || empty($brand) || empty($category) || empty($tacgia) || empty($nhaxuatban) || empty($product_desc) || empty($price) || empty($soluong) || empty($product_type)) {
                $alert = "Các trường không được phép bỏ trống";
                return $alert;
            }
            else
            {
                if(!empty($file_name)){
                    //Nếu user chọn ảnh
                if($file_size > 2097152)
                {
                    $alert = "Kích thước hình ảnh không được lớn hơn 2MB !";
                    return $alert;
                }
                elseif(in_array($file_ext, $permited) === false)
                {
                    $alert = "<span>Bạn chi có thể đăng tải:-".implode(',',$permited)."</span>";
                    return $alert;
                }
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE sanpham SET 
                ten_sp = '$productName',
                id_dongia = '$brand',
                id_loaisanpham = '$category',  
                tacgia = '$tacgia',
                nhaxuatban = '$nhaxuatban',
                mota_sp = '$product_desc',
                gia = '$price',
                soluong = '$soluong',
                product_type = '$product_type',
                hinhanh = '$unique_image'
                WHERE id_sp ='$id'";
                }
                //Nếu user không chọn ảnh
                else{
                    $query = "UPDATE sanpham SET 
                ten_sp = '$productName',
                id_dongia = '$brand',
                id_loaisanpham = '$category',  
                tacgia = '$tacgia',
                nhaxuatban = '$nhaxuatban',
                mota_sp = '$product_desc',
                gia = '$price',
                soluong = '$soluong',
                product_type = '$product_type'
                WHERE id_sp ='$id'";
                }
            
                $result = $this->db->update($query);
                if($result)
                {
                    $alert = "<span>Sửa sản phẩm thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Sửa sản phẩm không thành công</span>";
                    return $alert;
                }
            }
        }
        public function del_product($id)
        {
            $query = "DELETE FROM sanpham WHERE id_sp = '$id'";
            $result = $this->db->delete($query);
            if($result)
                {
                    $alert = "<span>Xóa sản phẩm thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Xóa sản phẩm không thành công</span>";
                    return $alert;
                }
        }
        public function getproductbyId($id)
        {
            $query = "SELECT * FROM sanpham WHERE id_sp = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        //Kết thúc BackEnd
        // public function getproductbyId($id)
        // {
        //     $sp_tungtrang = 4;
        //     if(!isset($_GET['trang']))
        //     {
        //         $trang = 1;
        //     }else{
        //         $trang = $GET['trang'];
        //     }
        //     $tung_trang = ($trang=1)*$sp_tungtrang;
        //     $query = "SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT $tung_trang, $sp_tungtrang";
        //     $result = $this->db->select($query);
        //     return $result;
        // }
        public function getproduct_feathered()
        {
            $sp_tungtrang = 12;
            if(!isset($_GET['trang']))
            {
                $trang = 1;
            }else{
                $trang = $_GET['trang'];
            }
            $tung_trang = ($trang-1)*$sp_tungtrang;
            $query = "SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT $tung_trang, $sp_tungtrang";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_all_product()
        {
            $query = "SELECT * FROM sanpham WHERE product_type = '1'";
            $result = $this->db->select($query);
            return $result;
        }
        public function getproduct_brand()
        {
            $query = "SELECT * FROM sanpham WHERE id_dongia = '1'";
            $result = $this->db->select($query);
            return $result;
        }
        public function getproduct_brand_2()
        {
            $query = "SELECT * FROM sanpham WHERE id_loaisanpham = '8'";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_details($id)
        {
            $query = "SELECT sanpham.*, loaisanpham.ten_loaisanpham, dongia.giaxuat FROM sanpham INNER JOIN loaisanpham ON sanpham.id_loaisanpham = loaisanpham.id_loaisanpham INNER JOIN dongia ON sanpham.id_dongia = dongia.id_dongia WHERE sanpham.id_sp = '$id'";
            //$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId WHERE tbl_product.productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function insert_slider($data,$files)
        {
            $sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
            $ngaybatdau = mysqli_real_escape_string($this->db->link, $data['ngaybatdau']);
            $ngayketthuc = mysqli_real_escape_string($this->db->link, $data['ngayketthuc']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);

            //check-image
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['hinhanh']['name']; 
            $file_size = $_FILES['hinhanh']['size'];
            $file_temp = $_FILES['hinhanh']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div)); 
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/". $unique_image;
            //end-check-image
            if (empty($sliderName) || empty($ngaybatdau) || empty($ngayketthuc) || empty($type) || empty($file_name)) {
                $alert = "Các trường không được phép bỏ trống";
                return $alert;
            }
            
            else
            {
                move_uploaded_file($file_temp, $uploaded_image );
                $query = "INSERT INTO khuyenmai(tenkhuyenmai, ngaybatdau, ngayketthuc, type, hinhanh_km) 
                VALUES('$sliderName','$ngaybatdau', '$ngayketthuc','$type','$unique_image')";
                $result = $this->db->insert($query);
                if($result)
                {
                    $alert = "<span>Thêm khuyến mãi thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Thêm khuyến mãi không thành công</span>";
                    return $alert;
                }
                
            }
        }
        public function show_slider()
        {
            $query = "SELECT * FROM khuyenmai WHERE type ='1' ORDER BY id_khuyenmai DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_slider_list()
        {
            $query = "SELECT * FROM khuyenmai ORDER BY id_khuyenmai DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_type_slider($id,$type)
        {
            $type = mysqli_real_escape_string($this->db->link, $type);
            $query = "UPDATE khuyenmai SET type ='$type' WHERE id_khuyenmai = '$id'";
            $result = $this->db->update($query);
            return $result;
        }
        public function del_slider($id)
        {
            $query = "DELETE FROM khuyenmai WHERE id_khuyenmai = '$id'";
            $result = $this->db->delete($query);
            if($result)
                {
                    $alert = "<span>Xóa khuyến mãi thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Xóa khuyến mãi không thành công</span>";
                    return $alert;
                }
        }
       
    }
?>