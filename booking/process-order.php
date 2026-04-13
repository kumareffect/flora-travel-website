<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "ShoppingCart.php";

$member_id = 2; 
$shoppingCart = new ShoppingCart();

$cartItem = $shoppingCart->getMemberCartItem($member_id);

$item_quantity = 0;
$item_price = 0;

// ✅ FIX: handle correct price key dynamically
if (is_array($cartItem) && !empty($cartItem)) {
    foreach ($cartItem as $item) {

        $price = 0;

        // check possible keys (important fix)
        if (isset($item["price"])) {
            $price = $item["price"];
        } elseif (isset($item["product_price"])) {
            $price = $item["product_price"];
        }

        if (isset($item["quantity"]) && $price > 0) {
            $item_quantity += $item["quantity"];
            $item_price += ($price * $item["quantity"]);
        }
    }
}

$order = 0;
$name = $address = $district = ""; 

if (!empty($_POST["proceed_payment"])) {
    $name = $_POST['name'] ?? ''; 
    $address = $_POST['address'] ?? '';
    $district = $_POST['district'] ?? '';
}

// ✅ only proceed if all fields exist
if (!empty($name) && !empty($address) && !empty($district) && $item_price > 0) {

    $order = $shoppingCart->insertOrder($_POST, $member_id, $item_price);

    if (!empty($order) && is_array($cartItem)) {
        foreach ($cartItem as $item) {

            $price = 0;

            if (isset($item["price"])) {
                $price = $item["price"];
            } elseif (isset($item["product_price"])) {
                $price = $item["product_price"];
            }

            if (isset($item["id"]) && $price > 0) {
                $shoppingCart->insertOrderItem($order, $item["id"], $price);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/book.css" type="text/css" rel="stylesheet" />
    <title>Shopping Cart</title>
</head>
<body>

<div id="shopping-cart">
    <div class="txt-heading">
        <div class="txt-heading-label">Shopping Cart</div>

        <a id="btnEmpty" href="index.php?action=empty">
            <img src="image/empty-cart.png" class="float-right" />
        </a>

        <div class="cart-status">
            <div>Total Quantity: <?php echo $item_quantity; ?></div>
            <div>Total Price: $ <?php echo number_format($item_price, 2); ?></div>
        </div>
    </div>

    <?php if (!empty($cartItem)) { require_once("cart-list.php"); } ?>
</div>

<?php if (!empty($order)) { ?>

    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">

        <input type="hidden" name="business" value="sb-xcjhz551565@business.example.com"> 
        <input type="hidden" name="item_name" value="Cart Item"> 
        <input type="hidden" name="item_number" value="<?php echo $order; ?>"> 
        
        <!-- ✅ FIX: no number_format -->
        <input type="hidden" name="amount" value="<?php echo $item_price; ?>">

        <input type="hidden" name="currency_code" value="USD"> 
        <input type="hidden" name="notify_url" value="../projects/notify.php"> 
        <input type="hidden" name="return" value="../projects/response.php">
        <input type="hidden" name="cmd" value="_xclick"> 

        <input type="hidden" name="order" value="<?php echo $order; ?>">

        <input type="submit" class="btn-action" value="Continue Payment">

    </form>

<?php } else { ?>

    <div class="success">Problem in placing the order. Please try again!</div>

<?php } ?>

</body>
</html>