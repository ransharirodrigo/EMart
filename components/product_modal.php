<!DOCTYPE html>
<html>

<head>

</head>

<body>

    <div class="row">
        <div class="modal" id="wishlist_single_item_popup_view_modal" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body ">
                        <div class="row d-flex justify-content-end">
                            <div class="col-1">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <img src="../../assets/img/product_images/default_product_icon.svg" alt="product_image" id="product_image" />
                            </div>
                            <div class="col-6 ">
                                <div class="row">
                                    <h3 id="product_name">product name</h3>
                                </div>
                                <div class="row">
                                    <span id="price">price</span>
                                </div>
                                <div class="row mt-5">
                                    <i class="bi bi-star col-1"></i>
                                    <i class="bi bi-star col-1"></i>
                                    <i class="bi bi-star col-1"></i>
                                    <i class="bi bi-star col-1"></i>
                                    <i class="bi bi-star col-1"></i>
                                </div>
                                <div class="row mt-2">
                                    <p id="product_description">product description</p>
                                </div>
                                <div class="row input-group ">
                                    <span class="col-7 input-group-text">Quantity</span>
                                    <input type="number" id="quantityInputInPopup" class="col-5 form-control" oninput="validateQuantity()" />
                                </div>
                                <div class="row mt-3" id="addToCartBtn">
                                    <button class="btn btn-dark col-11">Add to Cart</button>
                                </div>
                                <div class="row mt-1" id="buyNowBtn">
                                    <button class="btn btn-dark col-11">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>