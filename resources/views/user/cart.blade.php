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



    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info" id="list-carts">
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
                                        <a href=""><img src="/user/image/{{ $item['productInfo']->img }}"
                                                alt=""></a>
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
                            
                        @endif


                    </tbody>
                </table>



            </div>
            @if (Session::has('Cart') != null)
                <div class="row">
                    <div class="col-lg-4 offset-lg-8 pull-right">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Subtotal:
                                    <span>{{ number_format(Session::get('Cart')->totalQuanty) }}</span>
                                </li>
                                <li class="cart-total">Total:
                                    <span>{{ number_format(Session::get('Cart')->totalPrice) }}₫</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>
    <!--/#cart_items-->



@endsection
