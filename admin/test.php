<?php
$conn = mysqli_connect("localhost", "root", "", "E-commerce");
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_POST['submit'])) {
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productDescription = mysqli_real_escape_string($conn, $_POST['productDescription']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $categoryType = mysqli_real_escape_string($conn, $_POST['categoryType']);
    $product_image = mysqli_real_escape_string($conn, $_FILES['product_image']['name']);
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder1 = 'images/' . $product_image;
    // echo $product_image_folder1 . '</br>';

    switch ($categoryType) {
        case "Full_Suits":
            $category_id = 1;
            break;
        case "Jeans For Men":
            $category_id = 2;
            break;
        case "Shirt":
            $category_id = 3;
            break;
        case "Sweatshirts_Hoodies":
            $category_id = 4;
            break;
        case "T_Shirt":
            $category_id = 5;
            break;
        case "Dresses":
            $category_id = 6;
            break;
        case "Jackets_Coats":
            $category_id = 7;
            break;
        case "Jeans For Women":
            $category_id = 8;
            break;
        case "Skirts":
            $category_id = 9;
            break;
        case "Sweaters":
            $category_id = 10;
            break;
        case "Top":
            $category_id = 11;
            break;
    }

    if ($category_id < 6) {
        $categoryType = "Man";
    } else {
        $categoryType = "Woman";
    }
    // $database = mysql_select_db($db, $conn) or die("DB Selection Error: " . mysql_error());
    if (mysqli_connect_error()) {
        die("Failed to connect to the database: " . mysqli_connect_error());
    } else {
        echo "Connected to the database successfully" . "</br>";
    }
    $sql = "INSERT INTO `Products` (`product_name`, `product_description`, `price`, `image_url`, `category_id`, `category_type`) 
              VALUES ('$productName', '$productDescription', '$price', '$product_image_folder1', '$category_id', '$categoryType')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql)) {
        move_uploaded_file($product_image_tmp_name, $product_image_folder1);
        $message = 'new product added successfully';
        echo "<script type='text/javascript'>alert('$message'); window.location.href = 'add_products.php';</script>"; 
    } else {
        echo "Error adding product: " . mysqli_error($conn);
    }
    // if ($result) {
    //     echo "please";
    // }
}
