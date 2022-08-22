<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $products = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;

    public function __construct($cart){
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }

    public function AddCart($product, $product_id){
        $newProduct = ['quanty' => 0, 'price' => $product->price, 'productInfo' => $product];
        if($this->products){
            if (array_key_exists($product_id, $this->products)) {
                $newProduct = $this->products[$product_id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price'] = $newProduct['quanty'] * $product->price;
        $this->products[$product_id] = $newProduct;
        $this->totalPrice += $product->price;
        $this->totalQuanty++;
    }

    public function DeleteItemCart($product_id){
        $this->totalQuanty -= $this->products[$product_id]['quanty'];
        $this->totalPrice -= $this->products[$product_id]['price'];
        unset($this->products[$product_id]);
    }

    public function UpdateItemCart($product_id, $quanty){
        $this->totalQuanty -= $this->products[$product_id]['quanty'];
        $this->totalPrice -= $this->products[$product_id]['price'];

        $this->products[$product_id]['quanty'] = $quanty;
        $this->products[$product_id]['price'] = $quanty * $this->products[$product_id]['productInfo']->price;

        $this->totalQuanty += $this->products[$product_id]['quanty'];
        $this->totalPrice += $this->products[$product_id]['price'];
    }

}
