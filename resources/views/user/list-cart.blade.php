<table class="table table-condensed">
    <thead>
        <tr class="cart_menu">
            <td class="image">Image</td>
            <td class="p-name">Product Name</td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td class="save">Save</td>
            <td class="delete">Delete</td>
        </tr>
    </thead>
    <tbody>

        @if (Session::has('Cart') != null)
            @foreach (Session::get('Cart')->products as $item)
                <tr>
                    <td class="cart_product">
                        <img src="/user/image/{{ $item['productInfo']->img }}" alt="">
                    </td>
                    <td class="cart_description">
                        <h4>{{ $item['productInfo']->name }}</h4>
                    </td>
                    <td class="cart_price">
                        <p>{{ number_format($item['productInfo']->price) }}₫</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="quantity">
                            <div class="pro-qty cart_quantity_button">
                                <input class="cart_quantity_input"
                                    id="quanty-item-{{ $item['productInfo']->product_id }}" type="text"
                                    name="quantity" value="{{ $item['quanty'] }}" size="3">
                            </div>
                        </div>
                    </td>
                    <td class="cart_total cart_total_price">
                        {{ number_format($item['price']) }}₫
                    </td>
                    <td class="cart_save cart_quantity_save">
                        <i class="fa fa-save" onclick="SaveListItemCart({{ $item['productInfo']->product_id }});"></i>
                    </td>
                    <td class="cart_delete cart_quantity_delete">
                        <i class="fa fa-times"
                            onclick="DeleteListItemCart({{ $item['productInfo']->product_id }});"></i>
                    </td>
                </tr>
                <input type="number" id="total-quanty-list-cart" hidden
                    value="{{ number_format(Session::get('Cart')->totalQuanty) }}">
                <input type="text" id="total-price-list-cart" hidden
                    value="{{ number_format(Session::get('Cart')->totalPrice) }}₫">
            @endforeach
        @endif


    </tbody>
</table>
