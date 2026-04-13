<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include("../include/path.php");

?>
<head>
    <link rel="icon" type="title/png" href="../image/logo.png">
</head>
<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }

    function myFunctions() {
        var x = document.getElementById("myTopnavs");
        if (x.className === "topnavs") {
            x.className += " responsives";
        } else {
            x.className = "topnavs";
        }
    }
</script>

<?php include(ROOT_PATH . "/../app/includes/otherHeader.php"); ?>

<?php
require_once "ShoppingCart.php";

$member_id = 2; 

$shoppingCart = new ShoppingCart();
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            $productResult = $shoppingCart->getProductByCode($_GET["code"]);
            $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["id"], $member_id);

            if (empty($cartResult)) {
                
                $shoppingCart->addToCart($productResult[0]["id"], $member_id);
            }
            break;

        case "remove":
            
            $shoppingCart->deleteCartItem($_GET["id"]);
            break;

        case "empty":
            
            $shoppingCart->emptyCart($member_id);
            break;
    }
}
?>
<HTML>
<HEAD>
    <meta name="theme-color" content="#2887ff" />
    <meta name="description" content="Here is the list of projects which include Website Developement Code, Various kinds of Visiting Card Design, and Projects on Photoshop PSD & After Effects Ae Files." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta property="og:url" content="../projects/" />
    <meta property="og:type" content="Website" />
    <meta property="og:title" content="Projects" />
    <meta property="og:description" content="All the list of Projects" />
    <meta property="og:image" itemprop="image" content="../image/website_explore.jpg" />
    <meta itemprop="image" content="../image/website_explore.jpg">
    <link rel="icon" type="title/png" href="../image/kumarsite.png">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/book.css" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <TITLE>Welcome to my website</TITLE>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../css/withoutImage.css" />
    <script src="../js/uikit.js"></script>
    <style>
        a { color: #3f3c56; text-decoration: none; }
        a:focus, a:hover { color: #2887ff; }
        #header { position: relative; height: 100px; z-index: 8; }
        li { font-size: 14px; }
    </style>
</HEAD>
<BODY>
<?php
$cartItem = $shoppingCart->getMemberCartItem($member_id);
$item_price = 0;
if (!empty($cartItem)) {
    foreach ($cartItem as $item) {
        $item_price += $item["price"];
    }
}
?>
<div id="shopping-cart">
    <div class="txt-heading">
        <div class="txt-heading-label">Shopping Cart</div>
        <a id="btnEmpty" href="../login"><img src="image/empty-cart.png" alt="empty-cart" title="Empty Cart" class="float-right" /></a>
        <div class="cart-status">
            <div>Total Price: $<?php echo $item_price; ?></div>
        </div>
    </div>
    <?php if (!empty($cartItem)) { ?>
        <?php require_once("cart-buy.php"); ?>
        <div class="align-right">
            <a href="process-checkout.php"><button class="btn-action" name="check_out">Go To Checkout</button></a>
        </div>
    <?php } ?>
</div>
<?php require_once "product-buy.php"; ?>
<?php include(ROOT_PATH . "/../app/includes/otherFooter.php"); ?>
<script src="../js/index-main.js"></script>
</BODY>
</HTML>
