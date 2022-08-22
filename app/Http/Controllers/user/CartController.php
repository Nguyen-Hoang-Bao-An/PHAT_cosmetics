<?php

namespace App\Http\Controllers\user;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function index()
    {
        $products = DB::table('products')->get();
        return view('user.home', compact('products'));
    }

    public function AddCart(Request $request, $product_id)
    {
        $product = DB::table('products')->where('product_id', $product_id)->first();
        if ($product != null) {
            $oldcart = Session::get('Cart') ? Session::get('Cart') : null;
            $newcart = new Cart($oldcart);
            $newcart->AddCart($product, $product_id);

            $request->session()->put('Cart', $newcart);
        }
        return view('user.itemcart');
    }

    public function DeleteItemCart(Request $request, $product_id)
    {
        $oldcart = Session::get('Cart') ? Session::get('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($product_id);
        if (Count($newcart->products) > 0) {
            $request->Session()->put('Cart', $newcart);
        } else {

            $request->Session()->forget('Cart');
        }
        return view('user.itemcart');
    }

    public function ViewListCart()
    {
        return view('user.cart');
    }

    public function DeleteListItemCart(Request $request, $product_id)
    {
        $oldcart = Session::get('Cart') ? Session::get('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($product_id);
        if (Count($newcart->products) > 0) {
            $request->Session()->put('Cart', $newcart);
        } else {

            $request->Session()->forget('Cart');
        }
        return view('user.list-cart');
    }

    public function SaveListItemCart(Request $request, $product_id, $quanty)
    {
        $oldcart = Session::get('Cart') ? Session::get('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->UpdateItemCart($product_id, $quanty);
        $request->Session()->put('Cart', $newcart);
        return view('user.list-cart');
    }
}
