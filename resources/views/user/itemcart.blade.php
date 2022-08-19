@if (Session::has('Cart') != null)

    <div class="select-items">
        <table>
            <tbody>
                @foreach (Session::get('Cart')->products as $item)
                    <tr>
                        <td class="si-pic"><img src="/user/image/{{ $item['productInfo']->img }}" width="50%"
                                alt=""></td>
                        <td class="si-text">
                            <div class="product-selected">
                                <p>{{ number_format($item['productInfo']->price) }}₫
                                    x {{ $item['quanty'] }}</p>
                                <h6>{{ $item['productInfo']->name }}</h6>
                            </div>
                        </td>
                        <td class="si-close">
                            <i class="glyphicon glyphicon-remove" data-id="{{ $item['productInfo']->product_id }}"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="select-total">
        <span>total:</span>
        <h5>{{ number_format(Session::get('Cart')->totalPrice) }}₫</h5>
        <input type="number" id="total-quanty-cart" hidden value="{{ Session::get('Cart')->totalQuanty }}">
    </div>

@endif
@if (Session::has('Cart') != null)
    <div class="select-button">
        <a href="{{ url('List-Carts') }}" class="primary-btn view-card">VIEW CARD</a>
        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
    </div>
@endif
