<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $searchText = isset($_POST['searchText']) ? $_POST['searchText'] : '';
    $sortOption = isset($_POST['sortOption']) ? $_POST['sortOption'] : '0';
    $category = isset($_POST['category']) ? $_POST['category'] : '0';
    $minPrice = isset($_POST['minPrice']) ? $_POST['minPrice'] : '';
    $maxPrice = isset($_POST['maxPrice']) ? $_POST['maxPrice'] : '';
    $brand = isset($_POST['brand']) ? $_POST['brand'] : '0';
    $color = isset($_POST['color']) ? $_POST['color'] : '0';

    if ($searchText == "" && $sortOption == 0 && $category == 0 && $minPrice == "" && $maxPrice == "" && $brand == 0 && $color == 0) {
        echo "Default";
    } else {

        $query = "SELECT * FROM `product`";

        if ($searchText == "" && $category == 0 && $minPrice == "" && $maxPrice == "" && $brand == 0 && $color == 0) {


            if () {
            //    first sort option
            } elseif () {
            //    second sort option
            } elseif () {
              //    third sort option
            }
        } else {
            // add where 


            if ($sortOption == 0) {
                // no order by
            } else {
                // add order by
            }
        }

        Database::execute($query);
    }
}
