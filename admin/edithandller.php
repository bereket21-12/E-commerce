<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$conn = mysqli_connect("localhost", "root", "", "E-commerce3");

$product_id = $_POST['product_id'];
if (!isset($product_id)) {
    echo "Error: Product ID not set";
    exit();
}
if (isset($_POST['update_product'])) {
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productDescription = mysqli_real_escape_string($conn, $_POST['productDescription']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $categoryType = mysqli_real_escape_string($conn, $_POST['categoryType']);
echo $categoryType;
    if (isset($_FILES['product_image']) && !empty($_FILES['product_image']['name'])) {
        $product_image = mysqli_real_escape_string($conn, $_FILES['product_image']['name']);
        $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
        $product_image_folder1 = 'images/' . $product_image;
    } else {
        $product_image_folder1 = '';
    }

    switch ($categoryType) {
        case "Full_Suits":
            $category_id = 1;
            $product_image_folder1 = '../img/Men/Full_Suits/' . $product_image;
            break;
        case "Jeans For Men":
            $category_id = 2;
            $product_image_folder1 = '../img/Men/Jeans/' . $product_image;
            break;
        case "Shirt":
            $category_id = 3;
            $product_image_folder1 = '../img/Men/Shirt/' . $product_image;
            break;
        case "Sweatshirts_Hoodies":
            $category_id = 4;
            $product_image_folder1 = '../img/Men/Sweatshirts_Hoodies/' . $product_image;
            break;
        case "T_Shirt":
            $category_id = 5;
            $product_image_folder1 = '../img/Men/T_Shirt/' . $product_image;
            break;
        case "Dresses":
            $category_id = 6;
            $product_image_folder1 = '../img/Women/Dresses/' . $product_image;
            break;
        case "Jackets_Coats":
            $category_id = 7;
            $product_image_folder1 = '../img/Women/Jackets_Coats/' . $product_image;
            break;
        case "Jeans For Women":
            $category_id = 8;
            $product_image_folder1 = '../img/Women/Jeans/' . $product_image;
            break;
        case "Skirts":
            $category_id = 9;
            $product_image_folder1 = '../img/Women/Skirts/' . $product_image;
            break;
        case "Sweaters":
            $category_id = 10;
            $product_image_folder1 = '../img/Women/Sweaters/' . $product_image;
            break;
        case "Top":
            $category_id = 11;
            $product_image_folder1 = '../img/Women/Top/' . $product_image;
            break;
    }

    if ($category_id < 6) {
        $categoryType = "Man";
    } elseif ($category_id >= 6) {
        $categoryType = "Woman";
    } else {
        echo "Error: Invalid category type";
        exit();
    }



    $query = "UPDATE Products SET  product_name='$productName', product_description='$productDescription', price='$price', image_url='$product_image_folder1', category_id='$category_id', category_type
='$categoryType' WHERE product_id='$product_id'";

    $result = mysqli_query($conn, $query);

    if (mysqli_query($conn, $query)) {
        move_uploaded_file($product_image_tmp_name, $product_image_folder1);
        $message = 'Product updated successfully';
        echo "<script type='text/javascript'>alert('$message'); window.location.href = 'admin1.php';</script>"; 
    } else {
        echo "Error: Could not update product: " . mysqli_error($conn);
    }

    // if ($result) {
    //     if (!empty($product_image_folder1)) {
    //         move_uploaded_file($product_image_tmp_name, $product_image_folder1);

    //         $message = 'new product added successfully';
    //         echo "<script type='text/javascript'>alert('$message'); window.location.href = 'admin1.php';</script>";
    //     }
    //     header("Location: admin1.php");
    // } else {
    //     echo "Error: Could not update product";
    // }
}
