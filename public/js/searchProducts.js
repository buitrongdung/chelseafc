$(document).ready(function () {
    $('#searchProducts').click(function () {
        var textSearch = $('input[name=search]').val();
        $.ajax({
            url : 'http://chelseafc.lvh.me/shop/search',
            data : {'textSearch': textSearch},
            method : 'GET'
        }).done(function () {

        });
    });
});