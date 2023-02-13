<?php
$conn = mysqli_connect("localhost", "root", "", "E-commerce");

$product_id = $_POST['product_id'];
echo $product_id;
if (isset($_POST['update_product'])) {
    $productName = $_POST['productName'];
    echo "Hello";
    $productDescription = $_POST['productDescription'];
    echo $productName;
    $price = $_POST['price'];
    $categoryType = $_POST['categoryType'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder1 = 'images/' . $product_image;

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
    
    $q = "INSERT INTO Products (product_name, product_description, price, image_url, category_id, category_type) 
    VALUES ('$productName', '$productDescription', '$price', '$product_image_folder1', '$category_id', '$categoryType')";

    $query = "UPDATE Products SET  product_name='$productName', product_description='$productDescription', price='$price', image_url='$product_image_folder1', category_id='$category_id', category_type='$categoryType' WHERE product_id='$product_id'";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        move_uploaded_file($product_image_tmp_name, $product_image_folder1);
        $message = 'Product Updated successfully';
        echo "<script type='text/javascript'>alert('$message'); window.location.href = 'admin1.php';</script>";
    } else {
        echo "Error adding product: " . mysqli_error($conn);
    } 
}
?>