<?php

session_start();

include "./database/Dbcontroller.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

    
    $db = new DBConnection();
    $conn = $db->getConnection();
    
        foreach($_SESSION['item'] as $item){

        
            $sql = "INSERT INTO Orders (customer_id,product_id,price) 
            VALUES (?,?,?)";        
               $stmt = $conn->prepare($sql);
               $stmt->bind_param("sss", $_SESSION['customer_id'], $item['product_id'],$item['price']+10);
           
               if($stmt->execute()){
                array_splice($_SESSION['item'], 0);

                include("./orderpopup.php");
               } else{
                   echo "Error: " . $stmt->error;
               }

               $decrease_by = 1;

               $sql2 = "UPDATE Products SET quantity = quantity - $decrease_by WHERE product_id = {$item['product_id']}";
    
               if ($conn->query($sql2) === TRUE) {
                //    echo "Item quantity updated successfully.";
                header('Location: index.php');
               } else {
                   echo "Error updating item quantity: " . $conn->error;
               }
        
        }
        
        mysqli_close($conn);
?>

