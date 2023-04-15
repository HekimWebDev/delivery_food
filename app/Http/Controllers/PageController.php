<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function index() {
        $products = Product::paginate(10);
        return view('index', compact('products'));
    }

    public function prod_detail($id) {
        $product = Product::where('id',$id)->first();
        return view('product_detail', compact('product'));
    }

    public function signup() {
        return view('sign-up');
    }

    public function login() {
        return view('login');
    }

    public function rules() {
        return view('rules');
    }

    public function restaurant() {
        return view('restaurant');
    }
    public function restaurant2() {
        return view('restaurant2');
    }
    public function restaurant3() {
        return view('restaurant3');
    }

    public function cart() {
        return view('cart');
    }

    public function profile() {
        return view('profile');
    }

    public function address() {
        return view('add-address');
    }

    public function edit() {
        return view('edit-profile');
    }

    public function pay() {
        return view('pay');
    }

    public function password() {
        return view('forgot-password');
    }

    public function reset(Request $request) {
        return view('reset-password', ['request' => $request]);
    }
}
