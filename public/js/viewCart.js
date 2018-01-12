function myFunction(obj) {
    var baseUrl = "http://chelseafc.lvh.me/shop/view-cart";
    var id = $(obj).attr('data-id');
    var qty = $(obj).val();
    var price = $(obj).parent().prev().closest('div').find('span#price').text();
    if (qty > 0 && $.isNumeric(qty)) {
        var total = parseInt(qty) * price;
        $(obj).closest('tr').find('#a').text(number_format(total));
        $(obj).closest('tr').find('#total').text(total);// tìm kiếm <tr> gần nhất xem có class total ko thì truyền vào giá trị
        var totalAmount = 0;
        $('.invoice_item').each(function () {// lọc tất cả các <tr class="invoice_item">
            var subTotal = $(this).find('span#total').text();
            totalAmount += parseFloat(subTotal);
        });
        $('#totalAmount').text("U$ " + number_format(totalAmount));
        //updateQuantity();
        $.ajax({
            url: baseUrl + 'ajax-mua-hang',
            type: 'POST',
            cache: false,
            data: {'qty': qty, 'id': id},
            success: function (data) {
                if (data == 'oke') {
                    //window.location = baseUrl + 'hoa-don-thuc-don/xac-nhan';
                } else {
                    //alert('Error');
                }
            }
        });
    } else {
        alert("Enter the correct number!");
    }
}

function number_format(number, decimals, decPoint, thousandsSep) {
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 2 : +number;
    var prec = !isFinite(+decimals) ? 2 : Math.abs(decimals);
    var sep = (typeof thousandsSep === 'undefined') ? '.' : thousandsSep;
    var dec = (typeof decPoint === 'undefined') ? '.' : decPoint;
    var s = '';
    var toFixedFix = function (n, prec) {
        var k = Math.pow(10, prec);
        return '' + (Math.round(n * k) / k).toFixed(prec);
    };
    // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function removeProduct(obj)
{
    var idProduct = $(obj).attr("data-id");
    // alert(idProduct);
    $.getJSON("http://chelseafc.lvh.me/shop/remove-cart/", {"removeProduct" : idProduct}, function (data) {
        $('#yourCart').html(data.items);
        // $('#yourCart').trigger('click');
    });
}

function viewCart(obj)
{
    var listQty = [];
    $('input[name=quantity]').each(function () {
        listQty.push($(this).val());
    });
    var listIdProducts = [];
    $('input[name=idProduct]').each(function () {
        listIdProducts.push($(this).val());
    });
    var listSize = [];
    $('input[name=size]').each(function () {
        listSize.push($(this).val());
    });
    alert ("Order information has been sent to your email");
    $.getJSON('http://chelseafc.lvh.me/shop/info-cart/', {'qty' : listQty, 'id' : listIdProducts, 'size' : listSize}, function () {

    });
}

