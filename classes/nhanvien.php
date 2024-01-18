<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php

    class nhanvien
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_nhanvien($data)
        {
            // $brandName = $this->fm->validation($brandName);

            $tennhanvien = mysqli_real_escape_string($this->db->link, $data['tennhanvien']);
            $ngaysinh = mysqli_real_escape_string($this->db->link, $data['ngaysinh']);
            $sdt = mysqli_real_escape_string($this->db->link, $data['sdt']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $diachi = mysqli_real_escape_string($this->db->link, $data['diachi']);

            if(empty($tennhanvien) || empty($ngaysinh) || empty($sdt) || empty($email) || empty($diachi))
            {
                $alert = "Các trường không được phép bỏ trống";
                return $alert;
            }
            else
            {
                $query = "INSERT INTO nhanvien(ten_nhanvien, ngaysinh, sdt, email, diachi) 
                VALUES('$tennhanvien', '$ngaysinh', '$sdt', '$email', '$diachi')";
                $result = $this->db->insert($query);
                if($result)
                {
                    $alert = "<span>Thêm nhân viên thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Thêm nhân viên không thành công</span>";
                    return $alert;
                }
                
            }
        }
        public function show_nhanvien()
        {
            $query = "SELECT * FROM nhanvien ORDER BY id_nhanvien DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function getnhanvienbyId($id)
        {
            $query = "SELECT * FROM nhanvien WHERE id_nhanvien = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_nhanvien($data,$files,$id)
        {
            $tennhanvien = mysqli_real_escape_string($this->db->link, $data['tennhanvien']);
            $ngaysinh = mysqli_real_escape_string($this->db->link, $data['ngaysinh']);
            $sdt = mysqli_real_escape_string($this->db->link, $data['sdt']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $diachi = mysqli_real_escape_string($this->db->link, $data['diachi']);

            if(empty($tennhanvien) || empty($ngaysinh) || empty($sdt) || empty($email) || empty($diachi))
            {
                $alert = "Các trường không được phép bỏ trống";
                return $alert;
            }
            else
            {
                $query = "UPDATE nhanvien SET 
                ten_nhanvien = '$tennhanvien',
                ngaysinh = '$ngaysinh',
                sdt = '$sdt',
                email = '$email',
                diachi = '$diachi'
                WHERE id_nhanvien ='$id'";
                $result = $this->db->update($query);
                if($result)
                {
                    $alert = "<span>Sửa nhân viên thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Sửa nhân viên không thành công</span>";
                    return $alert;
                }
            }
        }
        public function del_nhanvien($id)
        {
            $query = "DELETE FROM nhanvien WHERE id_nhanvien = '$id'";
            $result = $this->db->delete($query);
            if($result)
                {
                    $alert = "<span>Xóa nhân viên thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Xóa nhân viên không thành công</span>";
                    return $alert;
                }
        }
       
       
    }
?>