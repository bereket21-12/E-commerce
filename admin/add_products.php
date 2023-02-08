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
                        <?php
                        // Connect to the database
                        $conn = mysqli_connect("localhost", "root", "", "E-commerce");
                        ?>
                        <div class="col-md-8">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h2 class="card-title">Add Products</h2>
                                </div>
                                <?php

if(isset($_POST["submit"])) {
    $productName = $_POST["productName"];
    $productDescription = $_POST["productDescription"];
    $price = $_POST["price"];
    $categoryType = $_POST["categoryType"];

    // get category id based on category type
    $categoryId = 0;
    switch ($categoryType) {
        case "Full_Suits":
            $categoryId = 1;
            break;
        case "Jeans":
            $categoryId = 2;
            break;
        case "Shirt":
            $categoryId = 3;
            break;
        case "Sweatshirts_Hoodies":
            $categoryId = 4;
            break;
        case "T_Shirt":
            $categoryId = 5;
            break;
        case "Dresses":
            $categoryId = 6;
            break;
        case "Jackets_Coats":
            $categoryId = 7;
            break;
        case "Skirts":
            $categoryId = 8;
            break;
        case "Sweaters":
            $categoryId = 9;
            break;
        case "Top":
            $categoryId = 10;
            break;
        default:
            echo "Invalid category type";
            exit;
    }

    // image upload
    $imageUrl = "";
    if(isset($_FILES["imageUrl"]) && $_FILES["imageUrl"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["imageUrl"]["name"];
        $filetype = $_FILES["imageUrl"]["type"];
        $filesize = $_FILES["imageUrl"]["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        // Verify MYME type of the file
        if(in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)) {
                echo $filename . " is already exists.";
            } else {
                move_uploaded_file($_FILES["imageUrl"]["tmp_name"], "img/" . $filename);
                $imageUrl = "img/" . $filename;
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        echo "Error: " . $_FILES["imageUrl"]["error"];
    }

    // insert product into database
    $conn = mysqli_connect("localhost", "root", "", "E-commerce");
    $sql = "INSERT INTO products (productName, productDescription, price, categoryId, imageUrl)
    VALUES ('$productName', '$productDescription', '$price', '$categoryId', '$imageUrl')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    // Close the connection
    mysqli_close($conn);}
?>    

                                <!-- form start -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="productName">Product Name</label>
                                            <input type="text" name="productName" class="form-control" id="productName" placeholder="Enter Product Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="productDescription">Product Description</label>
                                            <textarea name="productDescription" class="form-control" id="productDescription" placeholder="Enter Product Description"></textarea>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="categoryId">Category Id</label>
                                            <input type="text" name="categoryId" class="form-control" id="categoryId" placeholder="Enter Category Id">
                                        </div> -->
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" class="form-control" id="price" placeholder="Enter Price">
                                        </div>
                                        <div class="form-group">
                                            <label for="categoryType">Category Type</label>
                                            <select class="form-control" name="categoryType">
                                                <option value="">Select category type</option>
                                                <optgroup label="Man">
                                                    <option value="Full_Suits">Full Suits</option>
                                                    <option value="Jeans">Jeans</option>
                                                    <option value="Shirt">Shirt</option>
                                                    <option value="Sweatshirts_Hoodies">Sweatshirts & Hoodies</option>
                                                    <option value="T_Shirt">T-Shirt</option>
                                                </optgroup>
                                                <optgroup label="Woman">
                                                    <option value="Dresses">Dresses</option>
                                                    <option value="Jackets_Coats">Jackets & Coats</option>
                                                    <option value="Jeans">Jeans</option>
                                                    <option value="Skirts">Skirts</option>
                                                    <option value="Sweaters">Sweaters</option>
                                                    <option value="Top">Top</option>
                                                </optgroup>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="imageUrl">Image</label>
                                            <input type="file" name="imageUrl" class="form-control" id="imageUrl">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
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
    <script src="dist/js/demo.js"></script>
    <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>