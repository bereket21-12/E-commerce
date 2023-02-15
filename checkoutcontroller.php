<?php

session_start();

include "./database/Dbcontroller.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

    
    $db = new DBConnection();
    $conn = $db->getConnection();
    
    
      
    

        foreach($_SESSION['item'] as $item){

            echo $item['product_id'];
        
            $sql = "INSERT INTO Orders (customer_id,product_id,price) 
            VALUES (?,?,?)";        
               $stmt = $conn->prepare($sql);
               $stmt->bind_param("sss", $_SESSION['customer_id'], $item['product_id'],$item['price']);
           
               if($stmt->execute()){
                   echo "Information submitted successfully";
               } else{
                   echo "Error: " . $stmt->error;
               }
        
        }
        





        

        mysqli_close($conn);





?>

