<?php
session_start();
$logged_in = $_SESSION["is_loggedin"];

if (!$logged_in) {
  
  header('Location: signup.php');
}


$product_id = $_GET['product_id'];
include "./database/Dbcontroller.php";

$db = new DBConnection();
$conn = $db->getConnection();



$sql = "SELECT * FROM Products WHERE product_id='$product_id'";
$result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);



    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['favorite'] []= array(
        "product_name" => $row["product_name"],
        "product_id" => $row["product_id"],
        "price" => $row["price"],
        "product_img_path" => $row["image_url"]


      );
    }


  // $_SESSION['fcounter'] ++;
  
  include("popup.php");

  echo '<script>

  const paragraph = document.getElementById("msg");
  paragraph.textContent = "Item Added to the  Favorite successfuly";
  

  // Get the modal
  var modal = document.getElementById("myModal");
  
  // Get the close button
  var close = document.getElementsByClassName("close")[0];
  
  // When the user clicks on the close button, hide the modal
  close.onclick = function() {
    modal.style.display = "none";
    history.go(-1);

  }
  
  // When the page is loaded, show the modal
  window.onload = function() {
    modal.style.display = "block";
  }
  </script>';



?>