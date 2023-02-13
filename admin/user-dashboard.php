<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login1.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Commerce</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../index.html" class="nav-link">Home</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../index.html" class="brand-link">
                <img src="dist/img/ec.png" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">E-Commerce</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/rsz_avatarmaker.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <p>Abel Zeleke</p>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link" data-toggle="dropdown">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="admin1.php" class="nav-link">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>Product Dashboard</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="user-dashboard.php" class="nav-link">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>User Dashboard</p>
                                    </a>
                                </li>
                            </ul>
                        </li> 
                        <li class="nav-item">
                            <a href="add_products.php" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Add Product
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            <section class="content-header"></section>
            <!-- Main content -->
            <section class="content" style="margin-top: 10px;">
                <div class="container-fluid">
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <div class="col-md-10">
                            <!-- Table -->
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <?php
                                        // Connect to the database
                                        $conn = mysqli_connect("localhost", "root", "", "E-commerce");

                                        $sql = "SELECT COUNT(*) FROM Customer";
                                        $result1 = mysqli_query($conn, $sql);

                                        // Set the number of products per page
                                        $customers_per_page = 15;

                                        // Get the total number of products
                                        $total_products_query = "SELECT COUNT(product_id) AS total_products FROM Products";

                                        $total_customers_query = "SELECT COUNT(customer_id) AS total_customers FROM Customer";

                                        $total_orders_query = "SELECT COUNT(order_id) AS total_orders FROM Orders";

                                        $total_products_result = mysqli_query($conn, $total_products_query);

                                        $total_orders_result = mysqli_query($conn, $total_orders_query);

                                        $total_customers_result = mysqli_query($conn, $total_customers_query);

                                        $total_products_row = mysqli_fetch_assoc($total_products_result);

                                        $total_customers_row = mysqli_fetch_assoc($total_customers_result);

                                        $total_orders_row = mysqli_fetch_assoc($total_orders_result);

                                        $total_products = $total_products_row['total_products'];
                                        $total_customers = $total_customers_row['total_customers'];
                                        $total_orders = $total_orders_row['total_orders'];

                                        // Calculate the number of pages
                                        $num_pages = ceil($total_products / $customers_per_page);

                                        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                                        // Make sure the page number is within the valid range
                                        if ($current_page < 1) {
                                            $current_page = 1;
                                        } elseif ($current_page > $num_pages) {
                                            $current_page = $num_pages;
                                        }

                                        // Calculate the starting product number for the current page
                                        $start_customer = ($current_page - 1) * $customers_per_page;

                                        // Query to fetch the products for the current page
                                        $query = "SELECT customer_id, first_name, last_name, email, username, `role` FROM Customer LIMIT $start_customer, $customers_per_page";
                                        $result = mysqli_query($conn, $query);

                                        ?>
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>Customer ID</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>email</th>
                                                    <th>Username</th>
                                                    <th>Role</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Loop through each row in the result
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['customer_id'] . "</td>";
                                                    echo "<td>" . $row['first_name'] . "</td>";
                                                    echo "<td>" . $row['last_name'] . "</td>";
                                                    echo "<td>" . $row['email'] . "</td>";
                                                    echo "<td>" . $row['username'] . "</td>";
                                                    echo "<td>" . $row['role'] . "</td>";
                                                    echo "<td><a href='edituser.php?id=" . $row['customer_id'] . "' class='nav-link'><i class='fas fa-edit' style='color:#ffc107;'></i></a></td>";
                                                    echo "<td><a href='delete_user.php?id=" . $row['customer_id'] . "' class='nav-link'><i class='fas fa-trash' style='color:#dc3545;'></i></a></td>";
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
                                                if ($current_page != 1) {
                                                    echo '<li class="page-item">
            <a class="page-link" href="?page=' . ($current_page - 1) . '" aria-label="Previous">
            <span aria-hidden="true">«</span>
            <span class="sr-only">Previous</span>
            </a>
            </li>';
                                                }
                                                // Show the page numbers
                                                for ($i = 1; $i <= $total_pages; $i++) {
                                                    if ($i == $current_page) {
                                                        echo '<li class="page-item active">
                    <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
                  </li>';
                                                    } else {
                                                        echo '<li class="page-item">
                    <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
                  </li>';
                                                    }
                                                }

                                                // Show next button if not on the last page
                                                if ($current_page != $total_pages) {
                                                    echo '<li class="page-item">
                <a class="page-link" href="?page=' . ($current_page + 1) . '" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
              </li>';
                                                }
                                                ?>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-2">
                            <div class="info-box mb-3 bg-success">
                                <span class="info-box-icon"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Customers</span>
                                    <span class="info-box-number"><?php echo $total_customers; ?></span>
                                </div>
                            </div>

                            <div class="info-box mb-3 bg-warning">
                                <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Inventory</span>
                                    <span class="info-box-number"><?php echo $total_products; ?></span>
                                </div>
                            </div>

                            <!-- /.info-box -->
                            <div class="info-box mb-3 bg-danger">
                                <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Orders</span>
                                    <span class="info-box-number"><?php echo $total_orders; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>