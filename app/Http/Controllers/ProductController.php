<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
    }

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


    public function add() {
        if(Auth()->user()) {
            $categories = Category::all();
            return view('admin.add_product')->with(
                [
                    'page_title'=>'Добавить Товары',
                    'categories'=>$categories,
                ]
            );
        } else {
            abort(403);
        }
    }


    public function store(Request $request) {
        if(Auth()->user()) {
            if($request->isMethod('post')){
                try {
                    $result = $request->all();

                    $validator = Validator::make($result,[
                        'name'=>'required',
                        'price'=>'required',
                        'amount'=>'required',
//                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        'description'=>'required',
                    ]);

                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }


                    $product = new Product([
                        'name' => $result['name'],
                        'category_id' => $result['category_id'],
                        'price' => $result['price'],
                        'amount' => $result['amount'],
                        'description' => $result['description'],

                    ]);

                    $product->save();


                    return redirect()->route('admin_products')->with('status','Товар добавлена');
                }

                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка добавления: ' . $e->getMessage());
                }
            }

        } else {
            abort(403);
        }
    }

}
