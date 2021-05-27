<?php
require "../Shared/header.php";
?>
<script type="text/javascript" src="../Scripts/saveproduct.js"></script>
</head>
<body>

<div class="svgProdHeader">
    <div id="saveProductMessages" class="alert alert-primary" role="alert" style="display: none">
        product has been saved successfully !!!
    </div>
    <div class="row">
        <div class="col-md-10">
            <h2>Product Add</h2>
        </div>
        <div class="col-md-1">
            <button type="button" id="save" class="btn btn-success btn-block">Save</button>
        </div>
        <div class="col-md-1">
            <button type="button" id="cancel" class="btn btn-secondary btn-block">Cancel</button>
        </div>
    </div>
    <hr>

    <form id="product-save">
        <div class="row">
            <div class="col-md-1 text-right">
                SKU:
            </div>
            <div class="col-md-2">
                <input type="text" id="SKUtxt" class="form-control">
            </div>
            <div id="SKUMessages" class="col-md-3"></div>
        </div>

        <div class="row mt-2">
            <div class="col-md-1 text-right">
                Name:
            </div>
            <div class="col-md-2">
                <input type="text" id="productNametxt" class="form-control">
            </div>
            <div id="productNameMessages" class="col-md-3"></div>
        </div>

        <div class="row mt-2">
            <div class="col-md-1 text-right">
                Price ($):
            </div>
            <div class="col-md-2">
                <input type="text" id="pricetxt" class="form-control">
            </div>
            <div id="priceMessages" class="col-md-3"></div>
        </div>

        <div class="row mt-4">

            <div class="col-md-3">
                <label for="typeSwitcher" class="ml-4"> Type Switcher: </label>

                <select id="typeSwitcher">
                    <option value="-1">Type Switcher</option>
                    <option value="DVD">DVD</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Book">Book</option>
                </select>
            </div>
            <div id="typeSwitcherMessages" class="col-md-3"></div>
        </div>

        <div id="subForm">

        </div>

    </form>
</div>



<?php
require "../Shared/footer.php";
?>
