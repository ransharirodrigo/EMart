function loadBestSellingItems(category_name) {

    var category_name = category_name;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("best_selling_items_div").innerHTML = request.responseText;
          
        }
    };
    request.open("GET", "App/process/loadBestSellingItemsProcess.php?category_name=" + category_name, true);
    request.send();

}