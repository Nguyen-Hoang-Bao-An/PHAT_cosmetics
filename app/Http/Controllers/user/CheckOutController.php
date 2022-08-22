<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckOutController extends Controller
{
    public function checkout()
    {
        return view( view: 'user.checkout');
    }
}
