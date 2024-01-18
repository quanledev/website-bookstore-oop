<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php

    class blog
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_blog($data,$files)
        {         
            $title = mysqli_real_escape_string($this->db->link, $data['title']);
            $category = mysqli_real_escape_string($this->db->link, $data['category_post']);
            $mota = mysqli_real_escape_string($this->db->link, $data['mota']);
            $desc = mysqli_real_escape_string($this->db->link, $data['desc']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);

            //check-image
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name']; 
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div)); 
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/". $unique_image;
            //end-check-image
            if ($title=="" || $category=="" || $mota=="" ||$desc=="" || $type=="" || $file_name=="") {
                $alert = "Các trường không được phép bỏ trống";
                return $alert;
            }
            
            else
            {
                move_uploaded_file($file_temp, $uploaded_image );
                $query = "INSERT INTO tintuc(id_loaitintuc, tieude, mota, noidung, hinhanh, status) 
                VALUES('$category','$title', '$mota', '$desc','$unique_image','$type')";
                $result = $this->db->insert($query);
                if($result)
                {
                    $alert = "<span>Thêm tin tức thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Thêm tin tức không thành công</span>";
                    return $alert;
                }
                
            }
        }
        public function show_blog()
        {
            //$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId ORDER BY tbl_product.productId DESC";
            $query = "SELECT tintuc.*, loaitintuc.tenloaitt FROM tintuc INNER JOIN loaitintuc ON tintuc.id_loaitintuc = loaitintuc.id_loaitintuc ORDER BY tintuc.id_tintuc DESC";
            // $query = "SELECT * FROM tbl_product ORDER BY productId DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_blog($data,$files,$id)
        {

            $title = mysqli_real_escape_string($this->db->link, $data['title']);
            $category = mysqli_real_escape_string($this->db->link, $data['category_post']);
            $mota = mysqli_real_escape_string($this->db->link, $data['mota']);
            $desc = mysqli_real_escape_string($this->db->link, $data['desc']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);

            //check-image
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name']; 
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div)); 
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/". $unique_image;
            
            if ($title=="" || $category=="" || $mota=="" || $desc=="" || $type=="") {
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
                $query = "UPDATE tintuc SET 
                tieude = '$title',
                id_loaitintuc = '$category',
                mota = '$mota', 
                noidung = '$desc',
                status = '$type',
                hinhanh = '$unique_image'
                WHERE id_tintuc ='$id'";
                }
                //Nếu user không chọn ảnh
                else{
                    $query = "UPDATE tintuc SET 
                tieude = '$title',
                id_loaitintuc = '$category', 
                mota = '$mota', 
                noidung = '$desc',
                status = '$type'
                WHERE id_tintuc ='$id'";
                }
            
                $result = $this->db->update($query);
                if($result)
                {
                    $alert = "<span>Sửa tin tức thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Sửa tin tức không thành công</span>";
                    return $alert;
                }
            }
        }
        public function del_blog($id)
        {
            $query = "DELETE FROM tintuc WHERE id_tintuc = '$id'";
            $result = $this->db->delete($query);
            if($result)
                {
                    $alert = "<span>Xóa tin tức thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Xóa tin tức không thành công</span>";
                    return $alert;
                }
        }
        public function getblogbyId($id)
        {
            $query = "SELECT * FROM tintuc WHERE id_tintuc = '$id'";
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
        public function getblog_feathered()
        {
            $sp_tungtrang = 4;
            if(!isset($_GET['trang']))
            {
                $trang = 1;
            }else{
                $trang = $_GET['trang'];
            }
            $tung_trang = ($trang-1)*$sp_tungtrang;
            $query = "SELECT * FROM tintuc ORDER BY id_tintuc DESC LIMIT $tung_trang, $sp_tungtrang";
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
        public function get_blog_details($id)
        {
            $query = "SELECT tintuc.*, loaitintuc.tenloaitt FROM tintuc INNER JOIN loaitintuc ON tintuc.id_loaitintuc = loaitintuc.id_loaitintuc WHERE tintuc.id_tintuc = '$id'";
            //$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId WHERE tbl_product.productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
       
    }
?>