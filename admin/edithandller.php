
<?php
//     $query = "UPDATE Products SET  product_name='$productName', product_description='$productDescription', price='$price', image_url='$product_image_folder1', category_id='$category_id', category_type
// ='$categoryType' WHERE product_id='$product_id'";
$product_id = $_POST['product_id'];
//     $result = mysqli_query($conn, $query);
$conn = mysqli_connect("localhost", "root", "", "E-commerce3");
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_POST['update_product'])) {
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productDescription = mysqli_real_escape_string($conn, $_POST['productDescription']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $quantity = $_POST['quantity'];
    $categoryType = mysqli_real_escape_string($conn, $_POST['categoryType']);

    // echo $product_image_folder1 . '</br>';
    if (isset($_FILES['product_image']['name'])) {
        $product_image = mysqli_real_escape_string($conn, $_FILES['product_image']['name']);
        $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
        // $product_image_folder1 = 'images/' . $product_image;
    } else {
        $query2 = "SELECT * FROM Products WHERE product_id='$product_id'";
        $result2 = mysqli_query($conn, $query2);
        $product = mysqli_fetch_array($result2);
        $image_url = $product['image_url'];
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
    } else {
        $categoryType = "Woman";
    }
    // $database = mysql_select_db($db, $conn) or die("DB Selection Error: " . mysql_error());
    if (mysqli_connect_error()) {
        die("Failed to connect to the database: " . mysqli_connect_error());
    } else {
        echo "Connected to the database successfully" . "</br>";
    }
    if (isset($_FILES['product_image']['name'])) {
        $start = strpos($product_image_folder1, 'img');
        $image_url = substr($product_image_folder1, $start);
    }
    $sql = "UPDATE Products SET  product_name='$productName', product_description='$productDescription', price='$price', image_url='$image_url', category_id='$category_id', category_type='$categoryType', quantity='$quantity' WHERE product_id='$product_id'";

    // $sql = "INSERT INTO Products (product_name, product_description, category_id, price, image_url, category_type, quantity) VALUES ('$productName', '$productDescription', '$category_id', '$price', ' $image_url', '$categoryType', '$quantity')";
    $result = move_uploaded_file($product_image_tmp_name, $product_image_folder1);
    if (($result && mysqli_query($conn, $sql)) && (isset($_FILES['product_image']['name']))) {
        $message = 'Product updated successfully';
        echo "<script type='text/javascript'>alert('$message'); window.location.href = 'admin1.php';</script>";
    } else {
        echo "Error adding product: " . mysqli_error($conn);
    }
}
