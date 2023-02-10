<!-- <!-- ?php

include("./common/header.php");
include("./common/navbar.php");
include("./common/sidebar.php");

?

?php

include("./pages/forms/addprocuct.php");
?>

?php
include("./common/footer.php");
? -->

<table class="table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Product ID</th>
                                                            <th>Product Type</th>
                                                            <th>Product Name</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // Connect to the database
                                                        $conn = mysqli_connect("localhost", "root", "", "E-commerce");

                                                        // Query to fetch data from the Ecommerce Products table
                                                        $query = "SELECT product_id, category_type, product_name FROM Products";

                                                        // Execute the query and store the result in a variable
                                                        $result = mysqli_query($conn, $query);

                                                        // Loop through each row in the result
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            echo "<tr>";
                                                            echo "<td><a href='pages/examples/invoice.html'>" . $row['product_id'] . "</a></td>";
                                                            echo "<td>" . $row['category_type'] . "</td>";
                                                            echo "<td>" . $row['product_name'] . "</td>";
                                                            echo "<td><a href='#' class='nav-link'><i class='fas fa-edit' style='color:#ffc107;'></i></a></td>";
                                                            echo "<td><a href='delete_product.php?id=" . $row['product_id'] . "' class='nav-link'><i class='fas fa-trash' style='color:#dc3545;'></i></a></td>";
                                                            echo "</tr>";
                                                        }

                                                        // Close the database connection
                                                        mysqli_close($conn);
                                                        ?>
                                                    </tbody>
                                                </table>







<!--                                         -->
<table class="table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Product ID</th>
                                                            <th>Product Type</th>
                                                            <th>Product Name</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // database connection
                                                        $conn = mysqli_connect('localhost', 'root', '', 'E-commerce');
                                                        if (!$conn) {
                                                            die("Connection failed: " . mysqli_connect_error());
                                                        }

                                                        $limit = 10;
                                                        $page = (isset($_GET['page']) ? $_GET['page'] : 1);
                                                        $start = ($page - 1) * $limit;

                                                        $query = "SELECT product_id, product_name, product_description, category_id, price, image_url, category_type FROM Products LIMIT $start, $limit";
                                                        $result = mysqli_query($conn, $query);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo '<tr>
                <td><a href="pages/examples/invoice.html">' . $row['product_id'] . '</a></td>
                <td>' . $row['category_type'] . '</td>
                <td>' . $row['product_name'] . '</td>
                <td>
                  <a href="#" class="nav-link">
                    <i class="fas fa-edit" style="color:#ffc107;"></i>
                  </a>
                </td>
                <td>
                  <a href="#" class="nav-link" onclick="return confirm(\'Are you sure you want to delete this product?\')">
                    <i class="fas fa-trash" style="color:#dc3545;"></i>
                  </a>
                </td>
              </tr>';
                                                        }
                                                        mysqli_close($conn);
                                                        ?>
                                                    </tbody>
                                                </table>

                                                <div class="d-flex justify-content-center">
                                                    <nav aria-label="Page navigation example">
                                                        <ul class="pagination">
                                                            <?php
                                                            $total_pages = ceil(count($total_products) / $limit);
                                                            for ($i = 1; $i <= $total_pages; $i++) {
                                                                echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '">
                  <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
                </li>';
                                                            }
                                                            ?>
                                                        </ul>
                                                    </nav>
                                                </div>



                                                <!--  -->


                                                <table class="table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Product ID</th>
                                                            <th>Product Type</th>
                                                            <th>Product Name</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // Connect to the database
                                                        $conn = mysqli_connect("localhost", "root", "", "E-commerce");

                                                        // Query to fetch data from the Ecommerce Products table
                                                        $query = "SELECT product_id, category_type, product_name FROM Products";

                                                        // Execute the query and store the result in a variable
                                                        $result = mysqli_query($conn, $query);

                                                        // Loop through each row in the result
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            echo "<tr>";
                                                            echo "<td><a href='pages/examples/invoice.html'>" . $row['product_id'] . "</a></td>";
                                                            echo "<td>" . $row['category_type'] . "</td>";
                                                            echo "<td>" . $row['product_name'] . "</td>";
                                                            echo "<td><a href='#' class='nav-link'><i class='fas fa-edit' style='color:#ffc107;'></i></a></td>";
                                                            echo "<td><a href='delete_product.php?id=" . $row['product_id'] . "' class='nav-link'><i class='fas fa-trash' style='color:#dc3545;'></i></a></td>";
                                                            echo "</tr>";
                                                        }

                                                        // Close the database connection
                                                        mysqli_close($conn);
                                                        ?>
                                                    </tbody>
                                                </table>
<!--  -->


// Set the number of products to be displayed per page
                                                    $per_page = 15;

                                                    // Get the total number of products
                                                    $query = "SELECT COUNT(*) FROM Products";
                                                    $result = mysqli_query($conn, $query);
                                                    $total_rows = mysqli_fetch_array($result)[0];

                                                    // Calculate the total number of pages
                                                    $total_pages = ceil($total_rows / $per_page);

                                                    // Get the current page
                                                    $page = 1;
                                                    if (isset($_GET['page'])) {
                                                        $page = $_GET['page'];
                                                    }

                                                    // Calculate the start and end row for the current page
                                                    $start_row = ($page - 1) * $per_page;
                                                    $end_row = $start_row + $per_page;

                                                    // Query to fetch data from the Ecommerce Products table for the current page
                                                    $query = "SELECT product_id, category_type, product_name FROM Products LIMIT $start_row, $per_page";

                                                    // Execute the query and store the result in a variable
                                                    $result = mysqli_query($conn, $query);

                                                    // Loop through each row in the result
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo "<tr>";
                                                        echo "<td><a href='pages/examples/invoice.html'>" . $row['product_id'] . "</a></td>";
                                                        echo "<td>" . $row['category_type'] . "</td>";
                                                        echo "<td>" . $row['product_name'] . "</td>";
                                                        echo "<td><a href='#' class='nav-link'><i class='fas fa-edit' style='color:#ffc107;'></i></a></td>";
                                                        echo "<td><a href='delete_product.php?id=" . $row['product_id'] . "' class='nav-link'><i class='fas fa-trash' style='color:#dc3545;'></i></a></td>";
                                                        echo "</tr>";
                                                    }

                                                    // Close the database connection
                                                    mysqli_close($conn);
                                                    ?>












                                                    <?php

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "E-commerce");

// Set the number of products per page
$products_per_page = 15;

// Get the total number of products
$total_products_query = "SELECT COUNT(product_id) AS total_products FROM Products";
$total_products_result = mysqli_query($conn, $total_products_query);
$total_products_row = mysqli_fetch_assoc($total_products_result);
$total_products = $total_products_row['total_products'];

// Calculate the number of pages
$num_pages = ceil($total_products / $products_per_page);

// Get the current page number from the URL, default to 1 if not set
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Make sure the page number is within the valid range
if ($current_page < 1) {
    $current_page = 1;
} elseif ($current_page > $num_pages) {
    $current_page = $num_pages;
}

// Calculate the starting product number for the current page
$start_product = ($current_page - 1) * $products_per_page;

// Query to fetch the products for the current page
$query = "SELECT product_id, category_type, product_name FROM Products LIMIT $start_product, $products_per_page";
$result = mysqli_query($conn, $query);

?>
<table class="table m-0">
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Type</th>
            <th>Product Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop through each row in the result
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td><a href='pages/examples/invoice.html'>" . $row['product_id'] . "</a></td>";
            echo "<td>" . $row['category_type'] . "</td>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td><a href='#' class='nav-link'><i class='fas fa-edit' style='color:#ffc107;'></i></a></td>";
            echo "<td><a href='delete_product.php?id=" . $row['product_id'] . "' class='nav-link'><i class='fas fa-trash' style='color:#dc3545;'></i></a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>


                                                    <!-- Pagination -->
<nav aria-label="Product Pagination">
    <ul class="pagination justify-content-center">
        <?php
        // Show previous button if not on the first page 
<?php 
// Pagination
$pagination = new Pagination();

// Get the current page number
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Set the number of records per page
$records_per_page = 10;

// Get the total number of products in the database
$total_records = $pagination->getTotalProducts();

// Get the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// Set the start record for the current page
$start_from = ($page - 1) * $records_per_page;

// Get the products for the current page
$products = $pagination->getProducts($start_from, $records_per_page);

// Show previous button if not on the first page
if($page > 1){
    echo '<li class="page-item"><a class="page-link" href="?page='.($page - 1).'">Previous</a></li>';
}

// Show the page numbers
for($i = 1; $i <= $total_pages; $i++){
    if($i == $page){
        echo '<li class="page-item active"><a class="page-link" href="#">'.$i.'</a></li>';
    } else {
        echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
    }
}

// Show next button if not on the last page
if($page < $total_pages){
    echo '<li class="page-item"><a class="page-link" href="?page='.($page + 1).'">Next</a></li>';
}
?>
</ul>
</nav>


 -->