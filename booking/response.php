<?php
require_once "ShoppingCart.php"; 

$member_id = 2; 

$shoppingCart = new ShoppingCart(); 

?>
<HTML>
<HEAD>
<TITLE>Responsive Shopping Cart</TITLE>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/book.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>

<?php

$cartItem = $shoppingCart->getMemberCartItem($member_id);
$item_price = 0; 

if (!empty($cartItem)) {
    foreach ($cartItem as $item) {
        $item_price += $item["price"]; 
    }
} else {
    $item_price = 0; 
}
?>

<div id="shopping-cart">
    <div class="txt-heading">
        <div class="txt-heading-label">Shopping Cart</div>

        <a id="btnEmpty" href="index.php?action=empty"><img
            src="image/empty-cart.png" alt="Empty Cart"
            title="Empty Cart" class="float-right" /></a>
        
        <div class="cart-status">
            <div>Total Price: <?php echo number_format($item_price, 2); ?></div> 
        </div>
    </div>

    <?php
    
    if (!empty($cartItem)) {
        require_once("cart-list.php"); 
    } else {
        echo "<p>Your cart is empty.</p>"; 
    }
    ?>

</div>

<div class="success">
    
    Thank you for shopping with us. Your order has been placed. Your order ID is <?php echo htmlspecialchars($_GET["order_id"]); ?>.
</div>

<div>
    
    <a href="../services"><button class="btn-continue">Continue Shopping</button></a>
</div>

</BODY>
</HTML>
