    <?php
// $conn = mysqli_connect("localhost", "root", "", "E-commerce");

// $query = "SELECT image FROM Products";
// $result = mysqli_query($conn, $query);
// echo "Hello World";

// while ($row = mysqli_fetch_assoc($result)) {
//     echo '<img src="'.$row['image_url'].'" width="100" height="100">';
// }

// mysqli_close($conn);

$target_dir = "images/";
    $imageUrl = $target_dir . basename($_FILES['imageUrl']['name']);
?>