<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php

    class category
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_category($catName)
        {
            $catName = $this->fm->validation($catName);

            $catName = mysqli_real_escape_string($this->db->link, $catName);

            if(empty($catName))
            {
                $alert = "Category must be not empty";
                return $alert;
            }
            else
            {
                $query = "INSERT INTO loaisanpham(ten_loaisanpham) VALUES('$catName')";
                $result = $this->db->insert($query);
                if($result)
                {
                    $alert = "<span>Thêm danh mục sản phẩm thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Thêm danh mục sản phẩm không thành công</span>";
                    return $alert;
                }
                
            }
        }
        public function show_category()
        {
            $query = "SELECT * FROM loaisanpham ORDER BY id_loaisanpham DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_category($catName,$id)
        {
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            $id = mysqli_real_escape_string($this->db->link, $id);
            if(empty($catName))
            {
                $alert = "Category must be not empty";
                return $alert;
            }
            else
            {
                $query = "UPDATE loaisanpham SET ten_loaisanpham = '$catName' WHERE id_loaisanpham ='$id'";
                $result = $this->db->update($query);
                if($result)
                {
                    $alert = "<span>Sửa danh mục sản phẩm thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Sửa danh mục sản phẩm không thành công</span>";
                    return $alert;
                }
            }
        }
        public function del_category($id)
        {
            $query = "DELETE FROM loaisanpham WHERE id_loaisanpham = '$id'";
            $result = $this->db->delete($query);
            if($result)
                {
                    $alert = "<span>Xóa danh mục sản phẩm thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Xóa danh mục sản phẩm không thành công</span>";
                    return $alert;
                }
        }
        public function getcatbyId($id)
        {
            $query = "SELECT * FROM loaisanpham WHERE id_loaisanpham = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
       
    }
?>