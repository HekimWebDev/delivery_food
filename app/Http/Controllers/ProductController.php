<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Validator;
use Config;
use DB;

class ProductController extends Controller
{
    
    public function index() {
        if(Auth()->user()) {
            $products = \App\Product::paginate(10);
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
