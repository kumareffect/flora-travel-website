<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div id="product-grid">
    <div class="txt-heading">
        <div class="txt-heading-label">Trip avaliable!</div>
        <style>
            a{
                text-decoration: none;
                font-size: 15px;
                position: relative;
                left: -12px;
            }
            .product-item {
                transition: all 0.4s ease-in;
                cursor: pointer;
            }
            .product-item:hover {
                transition: all 0.4s ease;
                box-shadow: -4px 6px 15px black;
            }
        </style>
    </div>
    <?php
    $query = "SELECT * FROM tbl_product";
    $product_array = $shoppingCart->getAllProduct(); 

    if (! empty($product_array)) {
        foreach ($product_array as $key => $value) {
            ?>
            <div class="product-item">
                <form method="post"
                      action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                    <div class="product-image">
                        <img src="../image/<?php echo $product_array[$key]["image"]; ?>">
                        <div class="product-title">
                            <?php echo $product_array[$key]["name"]; ?>
                        </div>
                    </div>
                    <div class="product-footer">
                        <div class="float-right">
                            <input type="hidden" name="quantity" value="1"
                                   size="2" class="input-cart-quantity" />
                            <input type="image" src="image/add-to-cart.png" class="btnAddAction" />
                        </div>

                        <div class="product-price float-left"><?php echo "$".$product_array[$key]["price"]; ?></div>
                        </br>
                    </div>
                </form>
            </div>
            <?php
        }
    }
    ?>
    <script>
        $( "input[type=text]" ).focus(function() {
  $( this ).blur();
});
    </script>
</div>