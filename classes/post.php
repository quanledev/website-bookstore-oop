<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php

    class post
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_post($catName, $catDesc, $catStatus)
        {
            $catName = $this->fm->validation($catName);
            $catDesc = $this->fm->validation($catDesc);
            $catStatus = $this->fm->validation($catStatus);

            $catName = mysqli_real_escape_string($this->db->link, $catName);
            $catDesc = mysqli_real_escape_string($this->db->link, $catDesc);
            $catStatus = mysqli_real_escape_string($this->db->link, $catStatus);

            if(empty($catName) || empty($catDesc))
            {
                $alert = "Category must be not empty";
                return $alert;
            }
            else
            {
                $query = "INSERT INTO loaitintuc(tenloaitt,mota,status) VALUES('$catName','$catDesc','$catStatus')";
                $result = $this->db->insert($query);
                if($result)
                {
                    $alert = "<span>Thêm danh mục tin tức thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Thêm danh mục tin tức không thành công</span>";
                    return $alert;
                }
                
            }
        }
        public function show_post()
        {
            $query = "SELECT * FROM loaitintuc ORDER BY id_loaitintuc DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_category_post($catName, $catDesc, $catStatus,$id)
        {
            $catName = $this->fm->validation($catName);
            $catDesc = $this->fm->validation($catDesc);
            $catStatus = $this->fm->validation($catStatus);
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            $catDesc = mysqli_real_escape_string($this->db->link, $catDesc);
            $catStatus = mysqli_real_escape_string($this->db->link, $catStatus);
            $id = mysqli_real_escape_string($this->db->link, $id);
            if(empty($catName) || empty($catDesc))
            {
                $alert = "Category must be not empty";
                return $alert;
            }
            else
            {
                $query = "UPDATE loaitintuc SET tenloaitt = '$catName', mota = '$catDesc', status = '$catStatus' WHERE id_loaitintuc ='$id'";
                $result = $this->db->update($query);
                if($result)
                {
                    $alert = "<span>Sửa danh mục tin tức thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Sửa danh mục tin tức không thành công</span>";
                    return $alert;
                }
            }
        }
        public function del_category_post($id)
        {
            $query = "DELETE FROM loaitintuc WHERE id_loaitintuc = '$id'";
            $result = $this->db->delete($query);
            if($result)
                {
                    $alert = "<span>Xóa danh mục tin tức thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Xóa danh mục tin tức không thành công</span>";
                    return $alert;
                }
        }
        public function getcatpostbyId($id)
        {
            $query = "SELECT * FROM loaitintuc WHERE id_loaitintuc = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
       
    }
?>