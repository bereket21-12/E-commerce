<?php

include("fetchpro.php");

// Get the total number of products and calculate the number of pages required
$total_products = count($products);
$products_per_page = 12;
$total_pages = ceil($total_products / $products_per_page);

// Get the current page number from the query string, default to 1 if not set
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the starting index of the products for the current page
$starting_index = ($current_page - 1) * $products_per_page;

// Get the products for the current page
$current_page_products = array_slice($products, $starting_index, $products_per_page);

?>
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured Products</span></h2>
    <div class="row px-xl-5">
        <?php foreach ($current_page_products as $product) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src=<?php echo $product["product_img_path"]; ?> alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="cartinfo.php?product_id=<?php echo $product["product_id"]; ?>"><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="favoritecontroller.php?product_id=<?php echo $product["product_id"]; ?>"><i class="far fa-heart"></i></a>

                        </div>
                    </div>

                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="detail.php?product_id=<?php echo $product["product_id"]; ?>"><?php echo $product["product_name"]; ?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$<?php echo $product['price'] ?></h5>
                        </div>


                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Pagination -->
<nav>
    <ul class="pagination justify-content-center">
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <li class="page-item <?php echo ($current_page == $i) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>
