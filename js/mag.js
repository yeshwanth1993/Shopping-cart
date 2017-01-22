function add_to_cart(product_id)
{
    var cart_num = null;
    $.ajax({
        type: 'post',
        url: '<?php echo base_url();?>/nathantraders/add_cart_ajax',
        dataType: 'json',
        data: {
        product_id: product_id
        },
        success: function (response) 
        {
            // We get the element having id of display_info and put the response inside it
            cart_num = response.cart_num;
            $( "#cart_num" ).html (cart_num);
            setTimeout(function() {$('#cart_success').modal('hide');}, 1250);
        }
    });
}