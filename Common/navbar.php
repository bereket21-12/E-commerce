<?php

 
$link = null ;
session_start();

$logged_in = $_SESSION["is_loggedin"];

if (!$logged_in) {
  
    $cart_array = array();
    $cfavorite_array =array();
    $link = "./signup.php";
    $txt = "Signup";


}
else {
    $cart_array = array_unique($_SESSION['item'],SORT_REGULAR);
    $cfavorite_array = array_unique($_SESSION['favorite'],SORT_REGULAR);
    $logged_in = $_SESSION["is_loggedin"];
    $link = "./logout.php";
    $txt = "Logout";

}
?>
<body>

    <!-- Navbar Start -->

    <div class="container-fluid bg-dark justify-content-between">
        <div class="row">
            <div class="col-lg-3 d-none d-lg-inline-flex">
                <a class="navbar-brand" href="./index.html">
                    <img src="img/logo-color.png" width="70rem" height="60rem" style="padding: 0 5px; border-radius: 50%;" alt="">
                </a>
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100 " data-toggle="collapse" href="#navbar-vertical" style="height: 100%;">
                    <h5 class="text-dark m-0"><i class="fa fa-bars mr-2 "></i>Categories</h5>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse  position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light mt-5 ml-5" id="navbar-vertical" style="width: calc(80% - 10px); z-index: 999;">
                    <div class="navbar-nav w-100 ">

                        <div class="nav-item dropdown dropright">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Men<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="catagorydisplay.php?category_id=<?php echo $category_id=2;?>" class="dropdown-item">Jeans</a>
                                <a href="catagorydisplay.php?category_id=<?php echo $category_id=3;?>"  class="dropdown-item">Shirts</a>
                                <a href="catagorydisplay.php?category_id=<?php echo $category_id=5;?>"  class="dropdown-item">T-shirt</a>
                                <a href="catagorydisplay.php?category_id=<?php echo $category_id=1;?>"  class="dropdown-item">Full-suit</a>
                                <a href="catagorydisplay.php?category_id=<?php echo $category_id=4;?>"  class="dropdown-item">Sweatshirt_Hoodies</a>
                

                            </div>
                        </div>

                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Women<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="catagorydisplay.php?category_id=<?php echo $category_id=8;?>" class="dropdown-item">Jeans</a>
                                <a href="catagorydisplay.php?category_id=<?php echo $category_id=6;?>" class="dropdown-item">Dress</a>
                                <a href="catagorydisplay.php?category_id=<?php echo $category_id=7;?>" class="dropdown-item">Jackets_coats</a>
                                <a href="catagorydisplay.php?category_id=<?php echo $category_id=9;?>" class="dropdown-item">Skirt</a>
                                <a href="catagorydisplay.php?category_id=<?php echo $category_id=10;?>" class="dropdown-item">Sweaters</a>

                            </div>
                        </div>

                       
                </nav>
            </div>
            <div class="col-lg">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                          
                        
                            <a href="contacts.php" class="nav-item nav-link">Contact</a>
                 
                            <div class="col-lg-4 col-5 text-left mt-3" style="width: 600px;">
                                <form  action="./searchcontroller.php">
                                    <div class="input-group">
                                        <input name ="search" type="text" class="form-control" placeholder="Search for products">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-transparent text-primary">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <a href="<?php echo $link; ?>" class="text-white nav-link"><?php echo $txt; ?></a>


                        <a href="favorite.php" class="btn px-0 ">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?php echo sizeof($cfavorite_array); ?></span>
                        </a>
                        <a href="cart.php" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?php echo sizeof($cart_array); ?></span>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->