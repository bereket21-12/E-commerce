<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);


include "./database/Dbcontroller.php";


$db = new DBConnection();
$conn = $db->getConnection();


foreach($_SESSION['item'] as $item){

    echo $item['product_id'];

     $sql = "INSERT INTO orders (customer_id,product_id) 
       VALUES (?,?)";

       $stmt = $conn->prepare($sql);
       $stmt->bind_param("ss", $_SESSION['customer_id'], $item['product_id']);
   
       if($stmt->execute()){
           echo "Information submitted successfully";
       } else{
           echo "Error: " . $stmt->error;
       }

       $decrease_by = 1 ;

    //    UPDATE items SET quantity = quantity - 1 WHERE id = 123;
    $sql2 = "UPDATE Products SET quantity = quantity - $decrease_by WHERE product_id = {$item['product_id']}";
    if ($conn->query($sql2) === TRUE) {
      echo "Item quantity updated successfully.";
    } else {
      echo "Error updating item quantity: " . $conn->error;
    }
    


}

mysqli_close($conn);


?>