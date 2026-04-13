<div id="product-grid">
    <div class="txt-heading">
        <div class="txt-heading-label">Projects</div>
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
                </form>
                <div class="product-footer">
                    <form name="goto" method="post" action="../rent.php"><input type="hidden" name="search" value="<?php echo $product_array[$key]["code"];?>"><input style="z-index:8;" type="submit" value="Rent" name="find"></form>
                </div>


            </div>
            <?php
        }
    }
    ?>
</div>