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
                        <a href=""><img src="/user/image/{{ $item['productInfo']->img }}" alt=""></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="">{{ $item['productInfo']->name }}</a></h4>
                    </td>
                    <td class="cart_price">
                        <p>{{ number_format($item['productInfo']->price) }}₫</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_down" href=""> - </a>
                            <input class="cart_quantity_input" type="text" name="quantity"
                                value="{{ $item['quanty'] }}" autocomplete="off" size="2">
                            <a class="cart_quantity_up" href=""> + </a>
                        </div>
                    </td>
                    <td class="cart_total cart_total_price">
                        {{ number_format($item['price']) }}₫
                    </td>
                    <td class="cart_save cart_quantity_save">
                        <i class="fa fa-save"></i>
                    </td>
                    <td class="cart_delete cart_quantity_delete">
                        <i class="fa fa-times"
                            onclick="DeleteListItemCart({{ $item['productInfo']->product_id }});"></i>
                    </td>
                </tr>
            @endforeach
        @else
            @extends('user.layouts_user.master')

            @section('title')
                <title>Cart Page</title>
            @endsection

            @section('css')
                <link rel="stylesheet" href="{{ asset('user/css/home.css') }}">
            @endsection

            @section('js')
                <link rel="stylesheet" href="{{ asset('user/js/home.js') }}">
            @endsection

            @section('content')
            @endsection
        @endif


    </tbody>
</table>
