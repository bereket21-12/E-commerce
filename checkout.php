<?php
session_start();
$array = array_unique($_SESSION['item'], SORT_REGULAR);

include("./Common/header.php");
include("./Common/navbar.php");
echo "</br>";
?>

<div class="container-fluid mt-20">
    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3 mt-20">Order Total</span></h5>

    <div class="bg-light p-30 mb-5">
        <h6 class="mb-3">Products</h6>
        <?php foreach ($array as $product) :  ?>
            <div class="border-bottom">
                <div class="d-flex justify-content-between">
                    <p><?php echo $product['product_name']; ?></p> 
                    <p>$<?php $product['price'];
                        echo $total += $product['price']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="border-bottom pt-3 pb-2">
            <div class="d-flex justify-content-between mb-3">
                <h6>Subtotal</h6>
                <h6>$<?php echo $total; ?></h6>
            </div>
            <div class="d-flex justify-content-between">
                <h6 class="font-weight-medium">Shipping</h6>
                <h6 class="font-weight-medium"><?php if (empty($_SESSION['item'])) {
                                                    echo "$0";
                                                } else {
                                                    echo "$10";
                                                } ?></h6>
            </div>
        </div>
        <div class="pt-2">
            <div class="d-flex justify-content-between mt-2">
                <h5>Total</h5>
                <h5><?php if (empty($_SESSION['item'])) {
                        echo "$0";
                    } else {
                        echo  "$" . $total + 10;
                    } ?></h5>
            </div>
        </div>
    </div>

    <div class="mb-5">
        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
        <div class="bg-light p-30">

            <form method="post" action="https://test.yenepay.com/">
                <input type="hidden" name="Process" value="Express">
                <input type="hidden" name="MerchantOrderId" value="">
                <input type="hidden" name="MerchantId" value="SB2217">
                <input type="hidden" name="IPNUrl" value="">
                <input type="hidden" name="SuccessUrl" value="http://localhost/E-commerce-master/Template/checkoutcontroller.php">
                <input type="hidden" name="CancelUrl" value="http://localhost/E-commerce-master/Template/checkout.php">
                <input type="hidden" name="ItemId" value="72a471b2-3272-4198-8dc7-2da8f7e543cc">
                <input type="hidden" name="ItemName" value="Test Item 1">
                <input type="hidden" name="UnitPrice" value="<?php echo $total + 10;?>"> 
                <input type="hidden" name="Quantity" value="1">
                <input type="submit" class="btn btn-block btn-primary font-weight-bold py-3" value="Buy Now With YenePay Payment">
            </form>
        </div>
    </div>
</div>

<!-- <a href="./checkoutcontroller.php" class="btn btn-block btn-primary font-weight-bold py-3">Place Order With YenePay</a> -->
<!-- <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Place Order With YenePay</button> -->
</div>
</div>
</div>
</div>
<!-- Checkout End -->

<?php

include("./Common/footer.php");
?>