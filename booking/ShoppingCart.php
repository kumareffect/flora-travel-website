<?php
require_once "DBController.php";

class ShoppingCart extends DBController
{
    
    
    function getAllProduct()
    {
        $query = "SELECT * FROM tbl_product";
        return $this->getDBResult($query);
    }

    function getMemberCartItem($member_id)
    {
      $query = "SELECT tbl_product.*, tbl_cart.id as cart_id, tbl_cart.quantity 
          FROM tbl_product
          JOIN tbl_cart ON tbl_product.id = tbl_cart.product_id
          WHERE tbl_cart.member_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        
        return $this->getDBResult($query, $params);
    }

    function getProductByCode($product_code)
    {
        $query = "SELECT * FROM tbl_product WHERE code = ?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $product_code
            )
        );
        
        return $this->getDBResult($query, $params);
    }

    function getCartItemByProduct($product_id, $member_id)
    {
        $query = "SELECT * FROM tbl_cart WHERE product_id = ? AND member_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        
        return $this->getDBResult($query, $params);
    }

function addToCart($product_id, $member_id)
{
    $query = "INSERT INTO tbl_cart (product_id, member_id, quantity) VALUES (?, ?, ?)";

    $params = array(
        array("param_type" => "i", "param_value" => $product_id),
        array("param_type" => "i", "param_value" => $member_id),
        array("param_type" => "i", "param_value" => 1) // ✅ default quantity
    );

    return $this->insertDB($query, $params);
}

    function deleteCartItem($cart_id)
    {
        $query = "DELETE FROM tbl_cart WHERE id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );
        
        return $this->updateDB($query, $params);
    }

    function emptyCart($member_id)
    {
        $query = "DELETE FROM tbl_cart WHERE member_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        
        return $this->updateDB($query, $params);
    }
    
  function insertOrder($customer_detail, $member_id, $amount)
{
    $query = "INSERT INTO tbl_order 
    (customer_id, amount, name, address, city, state, zip, country, arrival, leaving, payment_type, order_status, order_at) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $params = array(
        array("param_type" => "i", "param_value" => $member_id),
        array("param_type" => "d", "param_value" => $amount),
        array("param_type" => "s", "param_value" => $customer_detail["name"]),
        array("param_type" => "s", "param_value" => $customer_detail["address"]),
        array("param_type" => "s", "param_value" => $customer_detail["city"]),
        array("param_type" => "s", "param_value" => $customer_detail["state"]),
        array("param_type" => "s", "param_value" => $customer_detail["zip"]),
        array("param_type" => "s", "param_value" => $customer_detail["country"]),
        array("param_type" => "s", "param_value" => $customer_detail["arrival"]),
        array("param_type" => "s", "param_value" => $customer_detail["leaving"]),
        array("param_type" => "s", "param_value" => "PAYPAL"),
        array("param_type" => "s", "param_value" => "PENDING"),
        array("param_type" => "s", "param_value" => date("Y-m-d H:i:s"))
    );


if ($amount <= 0) {
    die("Amount is 0 - check cart calculation");
}
    return $this->insertDB($query, $params);
}
    
    function insertOrderItem($order, $product_id, $price)
    {
        $query = "INSERT INTO tbl_order_item (order_id, product_id, item_price) VALUES (?, ?, ?)";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $order
            ),
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "d", 
                "param_value" => $price
            )
        );
        
        return $this->insertDB($query, $params);
    }
    
    function insertPayment($order, $payment_status, $payment_response)
    {
        $query = "INSERT INTO tbl_payment (order_id, payment_status, payment_response, create_at) VALUES (?, ?, ?, NOW())";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $order
            ),
            array(
                "param_type" => "s",
                "param_value" => $payment_status
            ),
            array(
                "param_type" => "s",
                "param_value" => $payment_response
            )
        );
        
        return $this->insertDB($query, $params);
    }
    
    function paymentStatusChange($order, $status) {
        $query = "UPDATE tbl_order SET order_status = ? WHERE id = ?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $status
            ),
            array(
                "param_type" => "i",
                "param_value" => $order
            )
        );
        
        return $this->updateDB($query, $params);
    }
}
