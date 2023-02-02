<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header('Location: login.php');
  exit;
}
include("./Common/header.php")
?>

<?php

include("./Common/navbar.php");

include("carousel.php");

include("catagory.php");

include("featured_products.php");

include("recent_products.php");

include("vendor.php");

?>

<?php
include("./Common/footer.php");

?>