$(document).ready(function () {
    $('.formAddToCart').submit(function (e) {
        var idProduct = $(this).find('input[name=idProduct]').val();
        var formData = $(this).serialize();
        var formButton = $(this).find("button[type=submit]");
        var selectSize = $(this).find('select[name=size]').val();
        if (selectSize === '0')
            alert("You must select a size before adding to Cart");
        else {
            $.ajax({
                url: 'http://chelseafc.lvh.me/shop/detail-product/' + idProduct,
                type: "POST",
                dataType: 'json',
                data: formData
            }).done(function (data) {
                $('#cart-info').html(data.items);
                formButton.html('Add To Cart');
                alert('Products added to Cart');
                if ($('.shopping-cart-box').css(display) === 'block') {
                    $('.cart-box').trigger('click');
                }
            });
            e.preventDefault();
        }
    });

    $('.cart-box').click(function (e) {
        var idProduct = $(this).find('input[name=idProduct]').val();
        e.preventDefault();
        $('.shopping-cart-box').fadeIn();
        $('#shopping-cart-results').load("http://chelseafc.lvh.me/shop/detail-product/" + idProduct, {"loadCart":"1"});
    });

    $( ".close-shopping-cart-box").click(function(e){
        e.preventDefault();
        $(".shopping-cart-box").fadeOut();
    });

    $('#shopping-cart-results').on('click', 'a.remove-item', function (e) {
        e.preventDefault();
        var idProduct = $(this).parent().attr('data-id');
        $(this).parent().fadeOut();
        $.getJSON("http://chelseafc.lvh.me/shop/detail-product/" + idProduct, {'removeProduct':idProduct}, function (data) {
            $('#cart-info').html(data.items);
            $('.cart-box').trigger('click');
        });
    });

    $('#invoice_item').on('click', 'a.removeProduct', function (e) {
        e.preventDefault();
        var idProduct = $(this).parent().attr('data-id');
        $(this).parent().fadeOut();
        $.getJSON("http://chelseafc.lvh.me/shop/remove-cart/", {'removeProduct':idProduct}, function (data) {
        });
    });
});

