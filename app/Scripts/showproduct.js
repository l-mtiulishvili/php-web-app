$(document).ready(function () {
    fetchTbl();

    $('#mass_dlt_btn').click(function () {

        let productIDArr = new Array();
        let DVDIDArr = new Array();
        let FurnitureIDArr = new Array();
        let BookIDArr = new Array();

        $('.box:checkbox:checked').each(function () {
            //let element = $(this).parent().html();
            //let element = $(this).parent();
            //let item = JSON.parse($(element).find('.hiddenInfo').val());
            //let item = $(element).find('.hiddenInfo').text();
            //console.log(`item = ${item}`);
            //console.log(`element = ${element}`);
            let element = $(this).parent();
            let item = JSON.parse($(element).find('.hiddenInfo').text());

            productIDArr.push(item.productID);
            if (item.DVDID !== null)
                DVDIDArr.push(item.DVDID);
            if (item.FurnitureID !== null)
                FurnitureIDArr.push(item.FurnitureID);
            if (item.BookID !== null)
                BookIDArr.push(item.BookID);
        });

        if(productIDArr.length !== 0){
            const postData = {
                productIDArr: productIDArr,
                DVDIDArr: DVDIDArr,
                FurnitureIDArr: FurnitureIDArr,
                BookIDArr: BookIDArr
            };
            $.post('../Controller/productDeleteController.php', postData, function (res) {
                console.log(res);
                $('#delete_messages').show('slow');
                setTimeout(function(){ $('#delete_messages').hide('slow'); }, 3000);
                fetchTbl();
            });
        }
    });

    function fetchTbl() {
        $.get('../Controller/productShowController.php', function (data) {
            //console.log(data);
            let template = ``, i = 0;
            JSON.parse(data).forEach(item => {
                if (i === 0)
                    template += `<tr>`;
                template += `<td>`;
                template += `
                  <fieldset class="field">
                  <div class="tdHead">
                    <input type="checkbox" class="box">
                    <!--<input type="hidden"  class=""  value="3487">
                    <input type="hidden"   value="3487">
                    <input type="hidden"   value="3487">
                    <input type="hidden"   value="3487"> -->
                   <!-- <input type="hidden" class="hiddenInfo"  value="{JSON.stringify(item)}"> -->
                    <!--{JSON.stringify(item)}-->
                    <p class="hiddenInfo" hidden>${JSON.stringify(item)}</p>
                  </div>
                  <div class="tdBody">
                    <p> ${item.SKU} </p>
                    <p> ${item.productName} </p>
                    <p> ${item.price} </p>
                    <p> ${item.info} </p>
                   </div> 
                   </fieldset> 
                 `;
                template += `</td>`;

                if (i === 3)
                    template += `</tr>`;
                i = ++i % 4;

            });
            $('#productTbl tbody').html(template);
        });
    }
});