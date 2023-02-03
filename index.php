<?php
    session_start();
    $logged_in = $_SESSION["is_loggedin"];

    if ($logged_in) {
      
      header('Location: login.php');
}
include("./Common/header.php");
include("./Common/navbar.php");
include("carousel.php");
include("catagory.php");
include("featured_products.php");
include("recent_products.php");
include("vendor.php");
include("./Common/footer.php");

?>