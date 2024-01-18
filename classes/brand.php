<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php

    class brand
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_brand($data)
        {
            // $brandName = $this->fm->validation($brandName);

            $ngaybatdau = mysqli_real_escape_string($this->db->link, $data['ngaybatdau']);
            $ngayketthuc = mysqli_real_escape_string($this->db->link, $data['ngayketthuc']);
            $gianhap = mysqli_real_escape_string($this->db->link, $data['gianhap']);
            $giaxuat = mysqli_real_escape_string($this->db->link, $data['giaxuat']);
            $ctkm = mysqli_real_escape_string($this->db->link, $data['ctkm']);
            $nguoilap = mysqli_real_escape_string($this->db->link, $data['nguoilap']);
            $ghichu = mysqli_real_escape_string($this->db->link, $data['ghichu']);

            if(empty($ngaybatdau) || empty($ngayketthuc) || empty($gianhap) || empty($giaxuat) || empty($ctkm) || empty($nguoilap) || empty($ghichu))
            {
                $alert = "Các trường không được phép bỏ trống";
                return $alert;
            }
            else
            {
                $query = "INSERT INTO dongia(ngaybatdau, ngayketthuc, gianhap, giaxuat, ctkm, nguoilap, ghichu) 
                VALUES('$ngaybatdau', '$ngayketthuc', '$gianhap', '$giaxuat', '$ctkm', '$nguoilap', '$ghichu')";
                $result = $this->db->insert($query);
                if($result)
                {
                    $alert = "<span>Thêm đơn giá thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Thêm đơn giá không thành công</span>";
                    return $alert;
                }
                
            }
        }
        public function show_brand()
        {
            $query = "SELECT * FROM dongia ORDER BY id_dongia DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function getbrandbyId($id)
        {
            $query = "SELECT * FROM dongia WHERE id_dongia = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_brand($data,$files,$id)
        {
            // $brandName = $this->fm->validation($brandName);
            // $brandName = mysqli_real_escape_string($this->db->link, $brandName);
            // $id = mysqli_real_escape_string($this->db->link, $id);
            $ngaybatdau = mysqli_real_escape_string($this->db->link, $data['ngaybatdau']);
            $ngayketthuc = mysqli_real_escape_string($this->db->link, $data['ngayketthuc']);
            $gianhap = mysqli_real_escape_string($this->db->link, $data['gianhap']);
            $giaxuat = mysqli_real_escape_string($this->db->link, $data['giaxuat']);
            $ctkm = mysqli_real_escape_string($this->db->link, $data['ctkm']);
            $nguoilap = mysqli_real_escape_string($this->db->link, $data['nguoilap']);
            $ghichu = mysqli_real_escape_string($this->db->link, $data['ghichu']);
            if(empty($ngaybatdau) || empty($ngayketthuc) || empty($gianhap) || empty($giaxuat) || empty($ctkm) || empty($nguoilap) || empty($ghichu))
            {
                $alert = "Các trường không được phép bỏ trống";
                return $alert;
            }
            else
            {
                $query = "UPDATE dongia SET 
                ngaybatdau = '$ngaybatdau',
                ngayketthuc = '$ngayketthuc',
                gianhap = '$gianhap',
                giaxuat = '$giaxuat',
                ctkm = '$ctkm',
                nguoilap = '$nguoilap',
                ghichu = '$ghichu'
                WHERE id_dongia ='$id'";
                $result = $this->db->update($query);
                if($result)
                {
                    $alert = "<span>Sửa đơn giá thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Sửa đơn giá không thành công</span>";
                    return $alert;
                }
            }
        }
        public function del_brand($id)
        {
            $query = "DELETE FROM dongia WHERE id_dongia = '$id'";
            $result = $this->db->delete($query);
            if($result)
                {
                    $alert = "<span>Xóa đơn giá thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Xóa đơn giá không thành công</span>";
                    return $alert;
                }
        }
       
       
    }
?>