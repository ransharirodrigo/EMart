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
                        <input type="text" class="form-control rounded-5" placeholder="Search">
                    </div>

                    <!-- Dropdown for sorting -->
                    <div class="col-12 col-sm-3 ">
                        <div class="row">
                            <div class="dropdown ">
                                <button class="btn btn-secondary dropdown-toggle col-12 text-center rounded-5" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort
                                </button>
                                <ul class="dropdown-menu col-11" aria-labelledby="sortDropdown">
                                    <li><a class="dropdown-item" href="#">Price Ascending</a></li>
                                    <li><a class="dropdown-item" href="#">Price Descending</a></li>
                                </ul>
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
                                <option selected>Choose...</option>
                                <?php while ($category = $category_resultset->fetch_assoc()) : ?>
                                    <option value="<?php echo $category['category_id']; ?>">
                                        <?php echo htmlspecialchars($category['category_name']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <!-- Price range selector -->
                        <div class="mb-4">
                            <label for="priceRange" class="form-label">Price Range</label>
                            <input type="range" class="form-range" id="priceRange" min="0" max="1000">
                        </div>

                        <!-- Brand dropdown -->
                        <div class="mb-4">
                            <label for="brandDropdown" class="form-label">Brand</label>

                            <?php
                            $brand_resultset = Database::execute("SELECT brand_id, brand_name FROM brand WHERE status_status_id = 1");
                            ?>

                            <select class="form-select" id="brandDropdown">
                                <option selected>Choose...</option>
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

                                <option selected>Choose...</option>
                                <?php while ($color = $color_resultset->fetch_assoc()) : ?>
                                    <option value="<?php echo $color['color_id']; ?>">
                                        <?php echo htmlspecialchars($color['color_name']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Right side filtered products -->
                    <div class="col-12 col-lg-9">
                        <div class="row" id="productContainer">
                            <div class="col-12 col-sm-6 col-md-4 productItemInAdvancedSearchPage ">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>


</body>

</html>