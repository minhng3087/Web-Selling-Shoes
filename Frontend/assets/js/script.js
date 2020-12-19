//assets/js/script.js
// Do trang đã tích hợp jQuery -> dùng cú pháp của jQuery
function number_format( number, decimals, dec_point, thousands_sep ) {

    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "," : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}
$(document).ready(function () {
    // Cart hover (header)
    $('.add-to-cart').click(function() {
        event.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: 'index.php?controller=cart&action=add',
            method: 'GET',
            data: {
                id: id
            },
            success: function (data) {
                console.log(data);
                $('.ajax-message')
                    .html('Thêm sản phẩm vào giỏ thành công');
                $('.ajax-message')
                    .addClass('ajax-message-active');
                setTimeout(function() {
                    $('.ajax-message')
                        .removeClass('ajax-message-active');
                }, 3000);
                renderCart(data);
            }
        });
    });

    $('#change-item-cart').on('click','a.ps-cart-item__close', function(){
        event.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: 'index.php?controller=cart&action=deleteItemCart',
            method: 'GET',
            data: {
                id: id
            },
            success: function (data) {
                console.log(data);
                $('.ajax-message')
                    .html('Xóa sản phẩm thành công');
                $('.ajax-message')
                    .addClass('ajax-message-active');
                setTimeout(function() {
                    $('.ajax-message')
                        .removeClass('ajax-message-active');
                }, 3000);
                renderCart(data);
            }
        });
    });

    // Cart table(Index)

    $('#list-cart').on('click','a.ps-remove', function(){
        event.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: 'index.php?controller=cart&action=deleteTableCart',
            method: 'GET',
            data: {
                id: id
            },
            success: function (data) {
                console.log(data);
                $('.ajax-message')
                    .html('Xóa sản phẩm thành công');
                $('.ajax-message')
                    .addClass('ajax-message-active');
                setTimeout(function() {
                    $('.ajax-message')
                        .removeClass('ajax-message-active');
                }, 3000);
                $('#list-cart').empty();
                $('#list-cart').html(data);
                $("input[type='number']").inputSpinner();

            }
        });
    });


    $('#list-cart').on('change','input[type=number]', function(){
        event.preventDefault();
        var id = $(this).attr('data-id');
        var quantity = parseInt($('#update-'+id).val());
        $.ajax({
            url: 'index.php?controller=cart&action=update',
            method: 'GET',
            data: {
                id: id,
                quantity: quantity
            },
            success: function (data) {
                console.log(data);
                $('.ajax-message')
                    .html('Xóa sản phẩm thành công');
                $('.ajax-message')
                    .addClass('ajax-message-active');
                setTimeout(function() {
                    $('.ajax-message')
                        .removeClass('ajax-message-active');
                }, 3000);
                $('#list-cart').empty();
                $('#list-cart').html(data);
                $("input[type='number']").inputSpinner();

            }
        });
    });

    function renderCart(data) {
        $('#change-item-cart').empty();
        $('#change-item-cart').html(data);
        var amount = $('.cart-amount').html();
        amount = amount == undefined ? 0 : amount.trim();
        $('#change-amount-cart').html(amount);
    }

    
});