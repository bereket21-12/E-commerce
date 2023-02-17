<?php
    session_start();

    $logged_in = $_SESSION["is_loggedin"];
    
    if (!$logged_in) {
      
      header('Location: signup.php');
    
    }
$array = array_unique($_SESSION['favorite'],SORT_REGULAR);
$procuct_id = $_GET['product_id'];


// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include("./Common/header.php");
include("./Common/navbar.php");
// include("./cartinfo.php");
// include("./fetchpro.php")



?>


<!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                            <th>Add-to-cart</th>

                        </tr>
                    </thead>
                    <tbody class="align-middle">

                    
    <?php foreach( $array as $product):  ?>

                        <tr>
                            <td class="align-middle"><img src= <?php echo $product["product_img_path"]; ?> alt="" style="width: 50px;"> <?php echo $product["product_name"]; ?></td>
                            <td class="align-middle"> <?php echo $product['price']; ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">$150</td>
                            <td  class="align-middle"><a href ="deletefav.php?product_id=<?php echo $product["product_id"]; ?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                            <td><a  name ="add-to-cart" type="submit" class="btn btn-primary px-3" href="favtocart.php?product_id=<?php  echo $product["product_id"]; ?>"><i class="fa fa-shopping-cart mr-1" ></i> Add To
                            Cart</a></td>
                        </tr>

    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            </div>
            </div>

    <?php

    include("./Common/footer.php")
    ?>

