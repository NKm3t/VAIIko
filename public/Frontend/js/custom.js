$(document).ready(function () {

    loadcart();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function loadcart() {
        $.ajax({
            method: "GET",
            url: "/load-cart-data",
            success: function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }
        });
    }

    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();
        var product_note = $(this).closest('.product_data').find('.note-input').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                "product_id": product_id,
                "product_qty": product_qty,
                "product_note": product_note,
            },
            dataType: "dataType",
            success: function (response) {
                loadcart();
                alert(response.status);

            }
        });
    });

    $('.increment-btn').click(function (e){
        e.preventDefault();

        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 1000)
        {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });
    $('.decrement-btn').click(function (e){
        e.preventDefault();

        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 1 : value;
        if (value > 1)
        {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $('.delete-cart-item').click(function (e) {
       e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

       var prod_id = $(this).closest('.product_data').find('.prod_id').val();
       $.ajax({
          method: "POST",
          url: "delete-cart-item",
          data: {
              'prod_id': prod_id,
          },
           success: function (response) {
              window.location.reload();
               alert(response.status, "success");
           }
       });
    });

    $('.changeQuantity').click(function (e){
       e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "update-cart",
            data: {
                'prod_id': prod_id,
                'prod_qty': qty,
            },
            success: function (response) {
                window.location.reload();
                //alert(response.status, "success");
            }
        });
    });

    $('.changeNote').click(function (e){
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var prod_note = $(this).closest('.product_data').find('.note-input').val();

        $(this).closest('.product_data').find('.note-input').val(prod_note);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "update-cart",
            data: {
                'prod_id': prod_id,
                'prod_note': prod_note,
            },
            success: function (response) {
                window.location.reload();
                //alert(response.status, "success");
            }
        });
    });
});
