$(document).ready(function (){
   $('#show_save_product').click(function () {
       let URL = 'http://localhost/WEB_SITES/SCANDIWEB/app/View/newproduct.php';
       window.location.href = URL;
   });

    $('#show_product_list').click(function () {
        let URL = 'http://localhost/WEB_SITES/SCANDIWEB/app/View/productlist.php';
        window.location.href = URL;
    });

    $('#cancel').click(function () {
        let URL = 'http://localhost/WEB_SITES/SCANDIWEB/app/View/index.php';
        window.location.href = URL;
    });

    $('#return-add').click(function () {
        let URL = 'http://localhost/WEB_SITES/SCANDIWEB/app/View/newproduct.php';
        window.location.href = URL;
    });

});