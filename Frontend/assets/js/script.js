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
                renderCart(data);
                alertify.success('Thêm sản phẩm thành công');
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
                data = JSON.parse(data);
                console.log(data);
                renderCart(data.cartHeader);
                renderTableCart(data.cartTable);
                alertify.success('Xóa sản phẩm thành công');
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
                data = JSON.parse(data);
                renderCart(data.cartHeader);
                renderTableCart(data.cartTable);
                alertify.success('Xóa sản phẩm thành công');
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
                data = JSON.parse(data);
                console.log(data);
                renderCart(data.cartHeader);
                renderTableCart(data.cartTable);

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

    function renderTableCart(data) {
        $('#list-cart').empty();
        $('#list-cart').html(data);
        $("input[type='number']").inputSpinner();
    }

    $('select[class="ps-select selectpicker"]').change(function(){
        var selected = $(this).children("option:selected").val();
        var name = location.href.split("/").pop();
        $('form.assss').submit();
    });
    $( "#searchbar" ).autocomplete({
        source: 'ajax-city-search.php',
    });
    
    
});