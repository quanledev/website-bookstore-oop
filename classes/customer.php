<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php

    class customer
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }   
        public function insert_customers($data)
        {
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);

            if (empty($email) || empty($password) || empty($address) || empty($name) || empty($phone) || empty($city) || empty($country) || empty($zipcode)) {
                $alert = "Các trường không được phép bỏ trống";
                return $alert;
            }
            else{
                $check_email ="SELECT * FROM khachhang WHERE email='$email' LIMIT 1";
                $result_check = $this->db->select($check_email);
                if($result_check)
                {
                    $alert = "Email đã tồn tại";
                    return $alert;
                }
                else
                {
                    $query = "INSERT INTO khachhang(email, password, diachi, tenkhachhang, sdt, thanhpho, quocgia, zipcode)
                    VALUES('$email','$password','$address','$name','$phone','$city','$country','$zipcode')";
                    $result = $this->db->insert($query);
                    if($result)
                    {
                    $alert = "<span>Tạo tài khoản thành công</span>";
                    return $alert;
                    }
                    else
                    {
                    $alert = "<span>Tạo tài khoản không thành công</span>";
                    return $alert;
                    }
                }

            }
        }
        public function login_customers($data)
        {
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            if (empty($email) || empty($password)) {
                $alert = "Các trường không được phép bỏ trống";
                return $alert;
            }
            else
            {
                $check_login ="SELECT * FROM khachhang WHERE email='$email'AND password='$password'";
                $result_check = $this->db->select($check_login);
                if($result_check)
                {
                    $value = $result_check->fetch_assoc();
                    Session::set('customer_login',true);
                    Session::set('customer_id',$value['id_khachhang']);
                    Session::set('customer_name',$value['tenkhachhang']);
                    header('Location:index.php');
                }
                else
                {
                    $alert = "Email hoặc Mật Khẩu không đúng";
                    return $alert;
                }
            }
        }
        public function show_customers($id)
        {
            $query ="SELECT * FROM khachhang WHERE id_khachhang='$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_customers($data,$id)
        {
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);

            if (empty($email) || empty($address) || empty($name) || empty($phone) || empty($city) || empty($country) || empty($zipcode)) {
                $alert = "Các trường không được phép bỏ trống";
                return $alert;
            }
            else{
                    $query = "UPDATE khachhang SET email='$email', diachi='$address', tenkhachhang='$name', sdt='$phone', thanhpho='$city', quocgia='$country', zipcode='$zipcode' WHERE id_khachhang = '$id'";
                    
                    $result = $this->db->insert($query);
                    if($result)
                    {
                    $alert = "<span>Cập nhật tài khoản thành công</span>";
                    return $alert;
                    }
                    else
                    {
                    $alert = "<span>Cập nhật tài khoản không thành công</span>";
                    return $alert;
                    }
                

            }
        }
    }   
?>