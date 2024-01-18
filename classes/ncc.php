<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php

    class ncc
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_ncc($data)
        {
            // $brandName = $this->fm->validation($brandName);

            $tenncc = mysqli_real_escape_string($this->db->link, $data['tenncc']);
            $nguoidaidien = mysqli_real_escape_string($this->db->link, $data['nguoidaidien']);
            $sdt = mysqli_real_escape_string($this->db->link, $data['sdt']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $diachi = mysqli_real_escape_string($this->db->link, $data['diachi']);

            if(empty($tenncc) || empty($nguoidaidien) || empty($sdt) || empty($email) || empty($diachi))
            {
                $alert = "Các trường không được phép bỏ trống";
                return $alert;
            }
            else
            {
                $query = "INSERT INTO nhacungcap(tenncc, tennguoidaidien, sdt, email, diachi) 
                VALUES('$tenncc', '$nguoidaidien', '$sdt', '$email', '$diachi')";
                $result = $this->db->insert($query);
                if($result)
                {
                    $alert = "<span>Thêm nhà cung cấp thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Thêm nhà cung cấp không thành công</span>";
                    return $alert;
                }
                
            }
        }
        public function show_ncc()
        {
            $query = "SELECT * FROM nhacungcap ORDER BY id_ncc DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function getnccbyId($id)
        {
            $query = "SELECT * FROM nhacungcap WHERE id_ncc = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_ncc($data,$files,$id)
        {
            $tenncc = mysqli_real_escape_string($this->db->link, $data['tenncc']);
            $nguoidaidien = mysqli_real_escape_string($this->db->link, $data['nguoidaidien']);
            $sdt = mysqli_real_escape_string($this->db->link, $data['sdt']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $diachi = mysqli_real_escape_string($this->db->link, $data['diachi']);

            if(empty($tenncc) || empty($nguoidaidien) || empty($sdt) || empty($email) || empty($diachi))
            {
                $alert = "Các trường không được phép bỏ trống";
                return $alert;
            }
            else
            {
                $query = "UPDATE nhacungcap SET 
                tenncc = '$tenncc',
                tennguoidaidien = '$nguoidaidien',
                sdt = '$sdt',
                email = '$email',
                diachi = '$diachi'
                WHERE id_ncc ='$id'";
                $result = $this->db->update($query);
                if($result)
                {
                    $alert = "<span>Sửa nhà cung cấp thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Sửa nhà cung cấp không thành công</span>";
                    return $alert;
                }
            }
        }
        public function del_ncc($id)
        {
            $query = "DELETE FROM nhacungcap WHERE id_ncc = '$id'";
            $result = $this->db->delete($query);
            if($result)
                {
                    $alert = "<span>Xóa nhà cung cấp thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Xóa nhà cung cấp không thành công</span>";
                    return $alert;
                }
        }
       
       
    }
?>