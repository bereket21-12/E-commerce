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


    <div class="mb-5">
        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
        <div class="bg-light p-30">

            
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
