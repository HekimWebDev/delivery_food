<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Exception;
use Config;
use DB;

class ProductController extends Controller
{
    
    public function index() {
        if(Auth()->user()) {
            $products = Product::paginate(10);
            return view('admin.products')->with(
                [
                    'products'=> $products,
                    'page_title'=>'Товары',
                ]
            );
        } else {
            abort(403);
        }
    }

    

}
