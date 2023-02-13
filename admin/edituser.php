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
                    <div class="col-md-10" style="margin: 0 auto;">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h2 class="card-title">Edit Customer</h2>
                            </div>
                            <style>
                                .card{
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
                                    margin-top: 20px;
                                    /* margin-bottom: 20px; */
                                    float: left;
                                }

                                button[type="submit"] {
                                    width: 150px;
                                    /* margin-top: 20px; */
                                    float: right;
                                    /* margin-right: 20px; */
                                }
                            </style>
                            <!-- form start -->
                            <?php
                            // Connect to the database
                            $conn = mysqli_connect("localhost", "root", "", "E-commerce");

                            // Get the user ID from the URL
                            $id = $_GET['id'];

                            // Get the current user information from the database
                            $query = "SELECT * FROM Customer WHERE customer_id = $id";
                            $result = mysqli_query($conn, $query);
                            $user = mysqli_fetch_array($result);

                            if (isset($_POST['submit'])) {
                                // Update the user information in the database
                                $first_name = $_POST['first_name'];
                                $last_name = $_POST['last_name'];
                                $email = $_POST['email'];
                                $username = $_POST['username'];
                                $role = $_POST['role'];

                                $query = "UPDATE Customer SET first_name = '$first_name', last_name = '$last_name', email = '$email', username = '$username', `role` = '$role' WHERE customer_id = $id";
                                $result = mysqli_query($conn, $query);

                                if ($result) {
                                    // Redirect the user back to the view users page
                                    header("Location: user-dashboard.php");
                                } else {
                                    echo "Error updating the user information: " . mysqli_error($conn);
                                }
                            }
                            ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" name="first_name" value="<?php echo $user['first_name']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" value="<?php echo $user['email']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input type="text" name="username" value="<?php echo $user['username']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="role">Role:</label>
                                    <select name="role" class="form-control">
                                        <option value="admin" <?php if ($user['role'] == 'admin') {
                                                                    echo 'selected';
                                                                } ?>>Admin</option>
                                        <option value="user" <?php if ($user['role'] == 'user') {
                                                                        echo 'selected';
                                                                    } ?>>Customer</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Update User</button> 
                                <a href="user-dashboard.php" class="btn btn-secondary">Discard Changes</a>
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
    <script src="dist/js/demo.js"></script>
    <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>