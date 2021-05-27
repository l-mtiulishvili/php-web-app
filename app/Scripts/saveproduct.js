$(document).ready(function () {
    $('#typeSwitcher').on('change', function () {
        let type = $("option:selected", this).val();
        //console.log(`type = ${type}`);
        let template = ``;
        switch (type) {
            case 'DVD':
                template = `
                    <div class="row mt-2">
                        <div class="col-md-1 text-right">
                            Size (MB)
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="MBtxt" class="form-control">
                        </div>
                        <div id="MBMessages" class="col-md-3"></div>
                    </div>
                  `;
                break;

            case 'Furniture':
                template = `
                    <div class="row mt-2">
                        <div class="col-md-1 text-right">
                            Height (CM)
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="heighttxt" class="form-control">
                        </div>
                        <div id="heightMessages" class="col-md-3"></div>
                    </div>
                    
                    <div class="row mt-2">
                        <div class="col-md-1 text-right">
                            Width (CM)
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="widthtxt" class="form-control">
                        </div>
                        <div id="widthMessages" class="col-md-3"></div>
                    </div>
                    
                    <div class="row mt-2">
                        <div class="col-md-1 text-right">
                            Length (CM)
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="lengthtxt" class="form-control">
                        </div>
                        <div id="lengthMessages" class="col-md-3"></div>
                    </div>
                  `;
                break;

            case 'Book':
                template = `
                    <div class="row mt-2">
                        <div class="col-md-1 text-right">
                            Weight (KG)
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="KGtxt" class="form-control">
                        </div>
                        <div id="KGMessages" class="col-md-3"></div>
                    </div>
                  `;
                break;

            default:
                template = ``;
                break;

        }

        $('#subForm').html(template);
    });


    function cst(txt) {
        if (txt === undefined)
            return null;
        return txt.trim();
    }

    function validateSKU(txt) {
        let len = txt.length;
        return len > 0 && len <= 30;
    }

    function validateProductName(txt) {
        let len = txt.length;
        return len > 0 && len <= 40;
    }

    function isNumber(n) {
        return !isNaN(parseFloat(n)) && !isNaN(n - 0);
    }

    function validateForm(SKU, productName, price, type, MB, height, width, length, KG) {
        let isSKU = validateSKU(SKU);
        let isProductName = validateProductName(productName);
        let isPrice = isNumber(price);
        let isType = type !== '-1';
        let isMB = (type === 'DVD' && isNumber(MB) || type !== 'DVD');
        let isHeight = (type === 'Furniture' && isNumber(height) || type !== 'Furniture');
        let isWidth = (type === 'Furniture' && isNumber(width) || type !== 'Furniture');
        let isLength = (type === 'Furniture' && isNumber(length) || type !== 'Furniture');
        let isKG = (type === 'Book' && isNumber(KG) || type !== 'Book');

        //update messages
        if (!isSKU)
            $('#SKUMessages').html(`<h6 class="error"> *please enter SKU [1; 30] </h6>`);
        else
            $('#SKUMessages').html(``);
        if (!isProductName)
            $('#productNameMessages').html(`<h6 class="error"> *please enter product name [1; 40] </h6>`);
        else
            $('#productNameMessages').html(``);
        if (!isPrice)
            $('#priceMessages').html(`<h6 class="error"> *please enter valid price ex. 12.99 </h6>`);
        else
            $('#priceMessages').html(``);
        if (!isType)
            $('#typeSwitcherMessages').html(`<h6 class="error"> *please select product type </h6>`);
        else
            $('#typeSwitcherMessages').html(``);
        if (!isMB)
            $('#MBMessages').html(`<h6 class="error"> *please enter valid megabytes ex. 256.47 </h6>`);
        else
            $('#MBMessages').html(``);
        if (!isHeight)
            $('#heightMessages').html(`<h6 class="error"> *please enter valid height cm ex. 57.47 </h6>`);
        else
            $('#heightMessages').html(``);
        if (!isWidth)
            $('#widthMessages').html(`<h6 class="error"> *please enter valid width cm ex. 57.47 </h6>`);
        else
            $('#widthMessages').html(``);
        if (!isLength)
            $('#lengthMessages').html(`<h6 class="error"> *please enter valid length cm ex. 57.47 </h6>`);
        else
            $('#lengthMessages').html(``);
        if (!isKG)
            $('#KGMessages').html(`<h6 class="error"> *please enter valid book kilogram ex. 5.23 </h6>`);
        else
            $('#KGMessages').html(``);

        /*
        //just testing output
        console.log(`isSKU: ${isSKU}`);
        console.log(`isProductName: ${isProductName}`);
        console.log(`isPrice: ${isPrice}`);
        console.log(`isType: ${isType}`);
        console.log(`isMB: ${isMB}`);
        console.log(`isHeight: ${isHeight}`);
        console.log(`isWidth: ${isWidth}`);
        console.log(`isLength: ${isLength}`);
        console.log(`isKG: ${isKG}`);
        //
         */

        return isSKU && isProductName && isPrice && isType && isMB && isHeight && isWidth && isLength && isKG;
    }

    $('#save').click(function () {

        let SKU = cst($('#SKUtxt').val());
        let productName = cst($('#productNametxt').val());
        let price = cst($('#pricetxt').val());
        let type = $("#typeSwitcher option:selected").val();
        let MB = cst($('#MBtxt').val());
        let height = cst($('#heighttxt').val());
        let width = cst($('#widthtxt').val());
        let length = cst($('#lengthtxt').val());
        let KG = cst($('#KGtxt').val());

        if(validateForm(SKU, productName, price, type, MB, height, width, length, KG)){

            const postData = {
                SKU: SKU,
                productName: productName,
                price: parseFloat(price).toFixed(2),
                type: type,
                MB: parseFloat(MB).toFixed(2),
                height: parseFloat(height).toFixed(2),
                width: parseFloat(width).toFixed(2),
                length: parseFloat(length).toFixed(2),
                KG: parseFloat(KG).toFixed(2)
            };
            $.post( '../Controller/productAddController.php', postData, function( result ) {
                console.log(result);
                $('#product-save').trigger('reset');
                $('#subForm').html(``);
               // $("typeSwitcher option:selected").val('-1');
                $('#saveProductMessages').show('slow');
                setTimeout(()=>{ $('#saveProductMessages').hide('slow'); }, 3000);
            });
        }


    });

});







