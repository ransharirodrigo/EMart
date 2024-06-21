<?php
$pageno;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Search</title>

    <link rel="icon" href="../../assets/img/e_mart_logo.png" />


</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php
            include "../../config.php";
            include(BASE_PATH . '/components/header.php');

            $product_resultset = Database::execute("SELECT * FROM `product`");

            ?>

            <!-- Main image -->
            <div class="col-12  px-0">
                <img src="<?php echo ROOT_PATH ?>assets/img/advancedSearchPageMainImg.svg" alt="Sales" class="w-100" />
            </div>

            <!-- Three divs -->
            <div class="col-12 d-none d-lg-block mt-4">
                <div class="row justify-content-around text-center text-lg-start">
                    <div class=" col-lg-3 ">
                        <div class="advancedSearchPageThreeDivs d-flex align-items-center p-3">
                            <img src="<?php echo ROOT_PATH ?>assets/img/advancedSearchPage/Vector.svg" alt="High Quality" class="advancedSearchPageThreeDivsImage me-3">
                            <div>
                                <h5 class="advancedSearchPageThreeDivsHeading">High Quality</h5>
                                <p class="advancedSearchPageThreeDivsText">Premium Quality</p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-3 ">
                        <div class="advancedSearchPageThreeDivs d-flex align-items-center p-3">
                            <img src="<?php echo ROOT_PATH ?>assets/img/advancedSearchPage/Vector-1.svg" alt="Free Shipping" class="advancedSearchPageThreeDivsImage me-3">
                            <div>
                                <h5 class="advancedSearchPageThreeDivsHeading">Free Shipping</h5>
                                <p class="advancedSearchPageThreeDivsText">No Cost Shipping</p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-3 ">
                        <div class="advancedSearchPageThreeDivs d-flex align-items-center p-3">
                            <img src="<?php echo ROOT_PATH ?>assets/img/advancedSearchPage/Vector-2.svg" alt="24 / 7 Support" class="advancedSearchPageThreeDivsImage me-3">
                            <div>
                                <h5 class="advancedSearchPageThreeDivsHeading">24 / 7 Support</h5>
                                <p class="advancedSearchPageThreeDivsText">Dedicated support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search bar with dropdown -->
            <div class="col-12 mt-4">
                <div class="row justify-content-around text-lg-start align-items-center">

                    <!-- Search bar -->
                    <div class="col-12 col-sm-7">
                        <input type="text" class="form-control rounded-4" placeholder="Search" id="searchTextInAdvancedSearchPage">
                    </div>

                    <!-- Dropdown for sorting -->
                    <div class="col-12 col-sm-3 ">
                        <div class="row">
                            <div class=" ">
                                <select id="sortOption" class="form-select bg-secondary text-white">
                                    <option value="0">SORT BY</option>
                                    <option value="1">PRICE LOW TO HIGH</option>
                                    <option value="2">PRICE HIGH TO LOW</option>
                                    <option value="3">Newly Added</option>

                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Content Area -->
            <div class="col-12 my-5">
                <div class="row">
                    <!-- Left side menu -->
                    <div class="col-12 col-lg-3 menuSectionInAdvancedSearchPage">
                        <!-- Category dropdown -->
                        <div class="mb-4">
                            <label for="categoryDropdown" class="form-label">Category</label>

                            <?php
                            $category_resultset = Database::execute("SELECT category_id, category_name FROM category WHERE status_status_id = 1");
                            ?>


                            <select class="form-select" id="categoryDropdown">
                                <option selected value="0">Choose...</option>
                                <?php while ($category = $category_resultset->fetch_assoc()) : ?>
                                    <option value="<?php echo $category['category_id']; ?>">
                                        <?php echo htmlspecialchars($category['category_name']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <!-- Price range -->
                        <div class="mb-4">
                            <div class="row">
                                <p>Price</p>
                            </div>
                            <div class="row">
                                <div class="col-6 d-flex flex-column">
                                    <label for="price-min">Min Price:</label>
                                    <input type="text" name="price-min" id="minPrice" class="form-control" value="" oninput="checkMinPriceInput()">
                                </div>
                                <div class="col-6 d-flex flex-column">
                                    <label for="price-max">Max Price:</label>
                                    <input type="text" name="price-max" id="maxPrice" class="form-control" value="" oninput="checkMaxPriceInput()">
                                </div>

                            </div>

                        </div>

                        <!-- Brand dropdown -->
                        <div class="mb-4">
                            <label for="brandDropdown" class="form-label">Brand</label>

                            <?php
                            $brand_resultset = Database::execute("SELECT brand_id, brand_name FROM brand WHERE status_status_id = 1");
                            ?>

                            <select class="form-select" id="brandDropdown">
                                <option selected value="0">Choose...</option>
                                <?php while ($brand = $brand_resultset->fetch_assoc()) : ?>
                                    <option value="<?php echo $brand['brand_id']; ?>">
                                        <?php echo htmlspecialchars($brand['brand_name']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <!-- Color dropdown -->
                        <div class="mb-4">
                            <label for="colorDropdown" class="form-label">Color</label>
                            <select class="form-select" id="colorDropdown">

                                <?php
                                $color_resultset = Database::execute("SELECT color_id, color_name FROM color WHERE status_status_id = 1");
                                ?>

                                <option selected value="0">Choose...</option>
                                <?php while ($color = $color_resultset->fetch_assoc()) : ?>
                                    <option value="<?php echo $color['color_id']; ?>">
                                        <?php echo htmlspecialchars($color['color_name']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col-8">
                                <div class="row">
                                    <button class=" btn btn-success" onclick="advancedSearchRequest()">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right side filtered products -->
                    <div class="col-12 col-lg-9">

                        <!-- Content -->
                        <div class="row" id="productContainer">

                            <?php
                            if ($product_resultset->num_rows == 0) {
                            ?>
                                <div>
                                    <span>No Products</span>
                                </div>
                                <?php
                            } else {

                                if (isset($_GET["page"])) {
                                    $pageno = $_GET["page"];
                                } else {
                                    $pageno = 1;
                                }

                                $product_num = 18;
                                $results_per_page = 6;
                                $number_of_pages = ceil($product_num / $results_per_page);

                                $page_results = ($pageno - 1) * $results_per_page;

                                $select_query = "SELECT * FROM `product`
                                 LEFT JOIN `product_images` ON `product`.`product_id`=`product_images`.`product_product_id` WHERE `status_status_id`='1'
                                 LIMIT " . $results_per_page . " OFFSET " . $page_results . "";

                                $selected_product_resultset = Database::execute($select_query);

                                for ($i = 0; $i < $selected_product_resultset->num_rows; $i++) {
                                    $selected_product_data =   $selected_product_resultset->fetch_assoc();

                                ?>
                                    <div class="col-12 col-sm-6 col-md-4 productItemInAdvancedSearchPage ">

                                        <div class="row">
                                            <a href="singleProductView.php?product_id=<?php echo ($selected_product_data['product_id']) ?>" class="text-decoration-none text-reset">
                                                <?php
                                                if ($selected_product_data["path"] == null) {
                                                ?>
                                                    <img src="../../assets/img/product_images/default_product_icon.svg" class="productImageInAdvancedSearchPage" alt="product image" />
                                                <?php
                                                } else {
                                                ?>
                                                    <img src="../../<?php echo $selected_product_data['path'] ?>" class="productImageInAdvancedSearchPage" alt="product image" />
                                                <?php
                                                }

                                                ?>

                                                <h5 class="mt-2"><?php echo $selected_product_data["title"] ?></h5>
                                            </a>
                                        </div>
                                        <div class="row">
                                            <div class="col-2 ">
                                                <i class="bi bi-bag-heart-fill wishlist_icon_for_product_card" onclick="addToWishList(<?php echo $selected_product_data['product_id'] ?>)"></i>
                                            </div>
                                            <div class="col-2 ">
                                                <i class="bi  bi-cart-fill cart_icon_for_product_card" onclick="addToCart(<?php echo $selected_product_data['product_id'] ?>)"></i>
                                            </div>
                                        </div>

                                    </div>


                            <?php
                                }
                            }

                            ?>
                            <!-- <div class="col-12 col-sm-6 col-md-4 productItemInAdvancedSearchPage ">
                                <img src="https://via.placeholder.com/150" alt="Product 1" class="productImageInAdvancedSearchPage">
                                <h5 class="mt-2">Product 1</h5>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 productItemInAdvancedSearchPage">
                                <img src="https://via.placeholder.com/150" alt="Product 2" class="productImageInAdvancedSearchPage">
                                <h5 class="mt-2">Product 2</h5>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 productItemInAdvancedSearchPage">
                                <img src="https://via.placeholder.com/150" alt="Product 3" class="productImageInAdvancedSearchPage">
                                <h5 class="mt-2">Product 3</h5>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 productItemInAdvancedSearchPage">
                                <img src="https://via.placeholder.com/150" alt="Product 1" class="productImageInAdvancedSearchPage">
                                <h5 class="mt-2">Product 1</h5>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 productItemInAdvancedSearchPage">
                                <img src="https://via.placeholder.com/150" alt="Product 2" class="productImageInAdvancedSearchPage">
                                <h5 class="mt-2">Product 2</h5>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 productItemInAdvancedSearchPage">
                                <img src="https://via.placeholder.com/150" alt="Product 3" class="productImageInAdvancedSearchPage">
                                <h5 class="mt-2">Product 3</h5>
                            </div> -->
                        </div>

                        <!-- Pagination -->
                        <div class="row mt-3">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">

                                    <li class="page-item"><a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    // echo "&page=" . ($pageno - 1);
                                                    echo "advancedSearch.php?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a></li>


                                    <?php
                                    for ($x = 1; $x <= $number_of_pages; $x++) {
                                        if ($x == $pageno) {
                                    ?>
                                            <li class="page-item active">
                                                <a class="page-link" href="<?php echo "advancedSearch.php?page=" . ($x); ?>"><?php echo $x; ?></a>
                                            </li>
                                        <?php
                                        } else {
                                        ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?php echo "advancedSearch.php?page=" . ($x); ?>"><?php echo $x; ?></a>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>

                                    <li class="page-item">
                                        <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "advancedSearch.php?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>



                </div>
            </div>

            <?php
            include "../../components/footer.php";
            ?>

        </div>
    </div>

    <script>
        const priceRange = document.getElementById('priceRange');
        const minPriceDisplay = document.getElementById('minPriceDisplay');
        const maxPriceDisplay = document.getElementById('maxPriceDisplay');

        minPriceDisplay.textContent = '$0';
        maxPriceDisplay.textContent = '$1000';

        function updatePrices() {
            const minPrice = parseInt(priceRange.value);
            const maxPrice = parseInt(priceRange.dataset.upperValue);
            minPriceDisplay.textContent = '$' + minPrice;
            maxPriceDisplay.textContent = '$' + maxPrice;
        }

        updatePrices();

        priceRange.addEventListener('input', function() {

            this.dataset.lowerValue = this.value;
            if (parseInt(this.dataset.lowerValue) >= parseInt(this.dataset.upperValue)) {
                this.value = this.dataset.upperValue;
                this.dataset.lowerValue = this.value;
            }
            updatePrices();
        });


        priceRange.addEventListener('mouseup', function() {

            this.dataset.upperValue = this.value;

            if (parseInt(this.dataset.upperValue) <= parseInt(this.dataset.lowerValue)) {
                this.value = this.dataset.lowerValue;
                this.dataset.upperValue = this.value;
            }
            updatePrices();
        });


        // validate price inputs
        function checkMinPriceInput() {
            const minPriceInput = document.getElementById('minPrice');
            const originalValue = minPriceInput.value;


            const numericValue = originalValue.replace(/\D/g, '');

            if (numericValue !== originalValue) {
                minPriceInput.value = numericValue;
            }
        }

        function checkMaxPriceInput() {
            const maxPriceInput = document.getElementById('maxPrice');
            const originalValue = maxPriceInput.value;


            const numericValue = originalValue.replace(/\D/g, '');

            if (numericValue !== originalValue) {
                maxPriceInput.value = numericValue;
            }
        }
        // validate price inputs
    </script>
    <script src="<?php echo ROOT_PATH ?>assets/js/script.js"></script>
</body>

</html>