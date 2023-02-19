<?php
session_start();
$logged_in = $_SESSION["is_loggedin"];

if (!$logged_in) {
  
  header('Location: login.php');
}
?>

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
                    <a href="../index.html" class="nav-link">Home</a>
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
                        <li class="nav-item">
                            <a href="outOfStock.php" class="nav-link">
                                <i class="fas fa-exclamation-triangle"></i>
                                <p>
                                    Out of Stock Prodcts
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
                    <div class="col-md-10" style="margin: 0 auto;">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h2 class="card-title">Edit Product</h2>
                            </div>
                            <!-- form start -->
                            <style>
                                .card-body {
                                    padding: 20px;
                                }

                                label {
                                    font-weight: bold;
                                    margin-top: 10px;
                                }

                                .form-group {
                                    margin-top: 20px;
                                }

                                #productDescription {
                                    height: 150px;
                                }

                                button[type="submit"] {
                                    width: 150px;
                                    margin-top: 20px;
                                    float: right;
                                }

                                a.btn-secondary {
                                    width: 150px;
                                    margin: 20px;
                                    /* margin-bottom: 20px; */
                                    float: left;
                                }

                                button[type="submit"] {
                                    width: 150px;
                                    margin-top: 20px;
                                    float: right;
                                    margin-right: 20px;
                                }
                            </style>

                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "E-commerce3");
                            $product_id = $_GET['id'];
                            if (isset($_GET['id'])) {

                                $query = "SELECT * FROM Products WHERE product_id='$product_id'";
                                $result = mysqli_query($conn, $query);
                                $product = mysqli_fetch_array($result);
                                $category_id = $product['category_id'];
                                $image_url = $product['image_url'];
                                $quantity = $product['quantity'];
                                $query1 = "SELECT category_name FROM `Categories` WHERE category_id='$category_id'";
                                $result1 = mysqli_query($conn, $query1);
                                $categoryName = mysqli_fetch_array($result1);
                                $category_name = $categoryName['category_name']; 
                            }
                            ?>
                            <!-- <form action="edithandller.php" method="post">
                                <div class="card-body">
                                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                    <div class="form-group">
                                        <label for="productName">Product Name</label>
                                        <input type="text" name="productName" class="form-control" id="productName" value="<?php echo $product['product_name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="productDescription">Product Description</label>
                                        <textarea name="productDescription" class="form-control" id="productDescription" value=""><?php echo $product['product_description']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" class="form-control" id="price" value="<?php echo $product['price']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="categoryType">Category Type</label>
                                        <select class="form-control" name="categoryType">
                                        <option value="<?php echo $categoryName; ?>"><?php echo $categoryName; ?></option>
                                        <optgroup label="Man">
                                            <option value="Full_Suits">Full Suits</option>
                                            <option value="Jeans For Men">Jeans For Men</option>
                                            <option value="Shirt">Shirt</option>
                                            <option value="Sweatshirts_Hoodies">Sweatshirts & Hoodies</option>
                                            <option value="T_Shirt">T-Shirt</option>
                                        </optgroup>
                                        <optgroup label="Woman">
                                            <option value="Dresses">Dresses</option>
                                            <option value="Jackets_Coats">Jackets & Coats</option>
                                            <option value="Jeans For Women">Jeans For Women</option>
                                            <option value="Skirts">Skirts</option>
                                            <option value="Sweaters">Sweaters</option>
                                            <option value="Top">Top</option>
                                        </optgroup>

                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="product_image">Image</label>
                                        <div class="custom-file">
                                            <input type="file" name="product_image" class="custom-file-input" id="product_image">
                                            <label class="custom-file-label" for="product_image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="update_product">Update Product</button>
                                <a href="admin1.php" class="btn btn-secondary">Discard Changes</a>
                            </form> -->


                            <!-- FORM -->
                            <form action="edithandller.php" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                <div class="form-group">
                                    <label for="productName">Product Name</label>
                                    <input type="text" name="productName" class="form-control" id="productName" value="<?php echo $product['product_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="productDescription">Product Description</label>
                                    <textarea name="productDescription" class="form-control" id="productDescription" value=""><?php echo $product['product_description']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" class="form-control" id="price" value="<?php echo $product['price']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity" class="form-control" id="price" value="<?php echo $quantity; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="categoryType">Category Type</label>
                                    <select class="form-control" name="categoryType">
                                        <option value="<?php echo $category_name; ?>"><?php echo $category_name; ?></option>
                                        <optgroup label="Man">
                                            <option value="Full_Suits">Full Suits</option>
                                            <option value="Jeans For Men">Jeans For Men</option>
                                            <option value="Shirt">Shirt</option>
                                            <option value="Sweatshirts_Hoodies">Sweatshirts & Hoodies</option>
                                            <option value="T_Shirt">T-Shirt</option>
                                        </optgroup>
                                        <optgroup label="Woman">
                                            <option value="Dresses">Dresses</option>
                                            <option value="Jackets_Coats">Jackets & Coats</option>
                                            <option value="Jeans For Women">Jeans For Women</option>
                                            <option value="Skirts">Skirts</option>
                                            <option value="Sweaters">Sweaters</option>
                                            <option value="Top">Top</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="product_image">Image</label>
                                    <div class="custom-file">
                                        <input type="file" name="product_image" class="custom-file-input" id="product_image">
                                        <label class="custom-file-label" for="product_image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="update_product">Update Product</button>
                                <a href="admin1.php" class="btn btn-secondary">Discard Changes</a>
                            </div>
                        </form>



                        </div>
                    </div>
            </section>
        </div>

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
    <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>