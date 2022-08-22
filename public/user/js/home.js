// $(document).on('click', '.buy-now', function(e){
//     e.preventDefault();
//     if ($(this).hasClass('disabled')) {
//         return false;
//     }
//     $(document).find('.buy-now').addClass('disabled');

//     var parent = $(this).parents('.single-products');
//     var cart = $(document).find('.cart-shop');
//     var src = parent.find('img').attr('src');

//     var parTop = parent.offset().top;
//     var parLeft = parent.offset().left;
//     console.log(src)
//     $('<img />', {
//         class: 'img-product-fly',
//         src: src
//     }).appendTo('body').css({
//         'top': parTop,
//         'left': parseInt(parLeft) + parseInt(parent.width()) - 50
//     });
//     setTimeout(function(){
//         $(document).find('.img-product-fly').css({
//             'top': cart.offset().top,
//             'left':  cart.offset().left
//         });
//         setTimeout(function(){
//             $(document).find('.img-product-fly').remove();
//             var citem = parseInt(cart.find('.count-item').data('count')) + 1;
//             cart.find('.count-item').text('('+citem+')').data('count', citem);
//             $(document).find('.buy-now').removeClass('disabled');
//         },1000);
//     },500);
// });

function AddCart(product_id){
    $.ajax({
        url: '/Add-Cart/'+product_id,
        type: 'GET',
     }).done(function(response){
        RenderCart(response);
        alertify.success('Success message');
     });
}

$("#change-item-cart").on("click", ".si-close i", function(){
    $.ajax({
        url: '/Delete-Item-Cart/'+$(this).data("id"),
        type: 'GET',
     }).done(function(response){
        RenderCart(response);
        alertify.success('Delete message');
     });
});

function RenderCart(response){
    $("#change-item-cart").empty();
    $("#change-item-cart").html(response);
    $("#total-quanty-show").text(!$("#total-quanty-cart").val() ? 0 : $("#total-quanty-cart").val());
}

function DeleteListItemCart(product_id){
    $.ajax({
        url: '/Delete-Item-List-Cart/'+product_id,
        type: 'GET',
     }).done(function(response){
        RenderListCart(response);
        alertify.success('Delete message');
     });
}

function SaveListItemCart(product_id){
    $.ajax({
        url: '/Save-Item-List-Cart/'+product_id+'/'+$("#quanty-item-"+product_id).val(),
        type: 'GET',
     }).done(function(response){
        RenderListCart(response);
        alertify.success('Update Success message');
     });
}

function RenderListCart(response){
    $("#list-carts").empty();
    $("#list-carts").html(response);
    $("#total-quanty-list-show").text(!$("#total-quanty-list-cart").val() ? 0 : $("#total-quanty-list-cart").val());
    $("#total-price-list-show").text(!$("#total-price-list-cart").val() ? 0 : $("#total-price-list-cart").val());

    var proQty = $('.pro-qty');
    proQty.prepend('<span class="slg dec qtybtn">-</span>');
    proQty.append('<span class="slg inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function(){
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
}


