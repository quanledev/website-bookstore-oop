<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php

    class cart
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }   
        public function add_to_cart($quantity,$product_stock,$id)
        {
            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);

            $product_stock = $this->fm->validation($product_stock);
            $product_stock = mysqli_real_escape_string($this->db->link, $product_stock);

            $id = mysqli_real_escape_string($this->db->link, $id);
            $sId = session_id();

            $checkcart = "SELECT * FROM phieudh WHERE id_sp = '$id' AND sId ='$sId'";
            $check_cart = $this->db->select($checkcart);
            if($quantity <= $product_stock){ //nếu số lượng đặt bé hơn tồn kho
                if($check_cart){
                    $msg = "Sản Phẩm Đã Được Thêm";
                    return $msg;
                }
                else
                {
                    $query = "SELECT * FROM sanpham WHERE id_sp = '$id'";
                    $result = $this->db->select($query)->fetch_assoc();

                    $product_image = $result["hinhanh"];
                    $price = $result["gia"];
                    $productName = $result['ten_sp'];

                    $query_insert = "INSERT INTO phieudh(id_sp, soluong, sId, hinhanh, gia, ten_sp) 
                    VALUES('$id','$quantity','$sId','$product_image','$price','$productName')";
                    $insert_result = $this->db->insert($query_insert);
                    if($result)
                    {
                        header('Location:cart.php');
                    }
                    else
                    {
                        $alert = "<span>Thêm sản phẩm không thành công</span>";
                        return $alert;
                    }
                }
            }else{
                $msg = "Số lượng đặt phải nhỏ hơn số lượng tồn kho";
                return $msg;
            }
            
        }
        public function get_product_cart()
        {
            $sId = session_id();
            $query = "SELECT * FROM phieudh WHERE sId = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_quantity_cart($quantity,$cartId)
        {
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $cartId = mysqli_real_escape_string($this->db->link, $cartId);
            $query = "UPDATE phieudh SET soluong = '$quantity' WHERE id_pdh='$cartId'";
            $result = $this->db->update($query);
                if($result)
                {
                    $alert = "<span>Update số lượng thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Update số lượng không thành công</span>";
                    return $alert;
                }
        }
        public function del_product_cart($cartId)
        {
            $cartId = mysqli_real_escape_string($this->db->link, $cartId);
            $query = "DELETE FROM phieudh WHERE id_pdh = '$cartId'";
            $result = $this->db->delete($query);
            if($result)
                {
                    header('Location:cart.php');
                }
                else
                {
                    $alert = "<span>Xóa sản phẩm giỏ hàng không thành công</span>";
                    return $alert;
                }
        }
        public function check_cart()
        {
            $sId = session_id();
            $query = "SELECT * FROM phieudh WHERE sId = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function check_order($customer_id)
        {
            $sId = session_id();
            $query = "SELECT * FROM hoadonxuat WHERE id_khachhang = '$customer_id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function del_all_data_cart()
        {
            $sId = session_id();
            $query = "DELETE FROM phieudh WHERE sId = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function insertOrder($customer_id)
        {
            $sId = session_id();
            $query = "SELECT * FROM phieudh WHERE sId = '$sId'";
            $get_product = $this->db->delete($query);
            if($get_product)
            {
                while($result = $get_product->fetch_assoc())
                {
                    $productId = $result['id_sp'];
                    $productName = $result['ten_sp'];
                    $quantity = $result['soluong'];
                    $price = $result['gia'] * $quantity;
                    $image = $result['hinhanh'];
                    $customer_id = $customer_id;

                    $query_order = "INSERT INTO hoadonxuat(id_sp, ten_sp, soluong, gia, hinhanh, id_khachhang) 
                    VALUES('$productId','$productName','$quantity','$price','$image','$customer_id')";
                    $insert_order = $this->db->insert($query_order);
                    // if($insert_order)
                    // {
                    //     header('Location:cart.php');
                    // }
                    // else
                    // {
                    //     $alert = "<span>Thêm sản phẩm không thành công</span>";
                    //     return $alert;
                    // }
                }
            }
        }
        public function getAmountPrice($customer_id)
        {
            $query = "SELECT gia FROM hoadonxuat WHERE id_khachhang ='$customer_id'";
            $get_price = $this->db->select($query);
            return $get_price;
        }
        public function get_cart_ordered($customer_id)
        {
            $query = "SELECT * FROM hoadonxuat WHERE id_khachhang ='$customer_id'";
            $get_cart_order = $this->db->select($query);
            return $get_cart_order;
        }
        public function  get_inbox_cart()
        {
            $query = "SELECT * FROM hoadonxuat ORDER BY ngaylap_hdx";
            $get_inbox_cart = $this->db->select($query);
            return $get_inbox_cart;
        }
        public function shiftid($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time );
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE hoadonxuat SET status = '1' WHERE id_hdx ='$id' AND ngaylap_hdx ='$time' AND gia ='$price'";
            $result = $this->db->update($query);
                if($result)
                {
                    $alert = "<span>Update thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Update không thành công</span>";
                    return $alert;
                }
        }
        public function del_shiftid($id,$time,$price)
        {
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time );
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "DELETE FROM hoadonxuat WHERE id_hdx ='$id' AND ngaylap_hdx ='$time' AND gia ='$price'";
            $result = $this->db->update($query);
                if($result)
                {
                    $alert = "<span>Xóa thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span>Xóa không thành công</span>";
                    return $alert;
                }
        }
        public function show_admin()
        {
            $query = "SELECT * FROM admin WHERE adminId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function shifted_confirm($id,$time,$price)
        {
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time );
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE hoadonxuat SET status = '2' WHERE id_khachhang ='$id' AND ngaylap_hdx ='$time' AND gia ='$price'";
            $result = $this->db->update($query);
            return $result;
        }
    }
?>