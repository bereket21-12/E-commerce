<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Commerce</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
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
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
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
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
                        <a href="#" class="d-block">Abel Zeleke</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="admin1.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Edit Product
                                </p>
                            </a>
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
                        <div class="col-md-8">
                            <!-- Table -->
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
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
                        <div class="col-md-4">
                            <!-- Info Boxes Style 2 -->
                            <div class="info-box mb-3 bg-success">
                                <span class="info-box-icon"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Customers</span>
                                    <span class="info-box-number">2,000</span>
                                </div>
                            </div>

                            <div class="info-box mb-3 bg-warning">
                                <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Inventory</span>
                                    <span class="info-box-number">5,200</span>
                                </div>
                            </div>

                            <!-- /.info-box -->
                            <div class="info-box mb-3 bg-danger">
                                <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Orders</span>
                                    <span class="info-box-number">114,381</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

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
    <!-- <script src="plugins/chart.js/Chart.min.js"></script> -->

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>