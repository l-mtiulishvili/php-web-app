<?php
require "../Shared/header.php";
?>
<script type="text/javascript" src="../Scripts/showproduct.js"></script>
</head>
<body>

<div class="productListHeader">
    <div id="delete_messages" class="alert alert-primary" role="alert" style="display: none">
       product has been deleted ...
    </div>
    <div class="row">
        <div class="col-md-9">
            <h3>Product List</h3>
        </div>
        <div class="col-md-1">
            <button type="button" id="return-add" class="btn btn-secondary btn-block">Add</button>
        </div>
        <div class="col-md-2">
            <button type="button" id="mass_dlt_btn" class="btn btn-danger btn-block">Mass Delete</button>
        </div>
    </div>
</div>
<hr class="line">
<form id="product-list" class="ml-3 mr-3">
    <table id="productTbl" class="table borderless">
        <tbody></tbody>
    </table>
</form>

<?php
require "../Shared/footer.php";
?>
