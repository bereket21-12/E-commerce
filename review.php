<?php

session_start();
    $logged_in = $_SESSION["is_loggedin"];

    if (!$logged_in) {
      
      echo "<script type='text/javascript'>alert('you have to create account first'); window.location.href = 'signup.php';</script>";

}

error_reporting(E_ALL);
ini_set('display_errors', 1);


include "./database/Dbcontroller.php";

$db = new DBConnection();
$conn = $db->getConnection();



    error_reporting(E_ALL);
ini_set('display_errors', 1);

    $product_id = $_POST['product_id'];
    $email = $_POST['email'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    


    echo "why it does not work";


  echo $product_id;


  $sql2 = "SELECT * FROM Orders  JOIN Customer ON  Orders.customer_id = Customer.customer_id AND Orders.product_id = $product_id";
$result2 = mysqli_query($conn, $sql2);
if (mysqli_num_rows($result2) > 0) {


    $sql = "INSERT INTO review ( product_id,customer_id,email,review,rate) VALUES (?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss",$product_id, $_SESSION['customer_id'],$email,$review, $rating );
   
    if ($stmt->execute()) {
        echo "Information submitted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
  
  
  
  
  


}else{

    echo "<script type='text/javascript'>alert('you have to buy the product first first'); window.location.href = 'index.php';</script>";

}

 

echo "rating is ".$rating;
mysqli_close($conn);


?>