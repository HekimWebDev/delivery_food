<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Ill;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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


    public function store(Request $request){
        if(Auth()->user()) {
            $request->validate([
                'name'=>'required',
                'price'=>'required',
                'amount'=>'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description'=>'required',
            ]);

            $product = new Product();
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            $product->amount = $request->amount;
            $product->description = $request->description;
            $product->image = $request->image;
            $product->save();

            if ($request->hasfile('image')) {
                $file_full_name = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($file_full_name, PATHINFO_FILENAME);
                $ext = $ext = pathinfo($file_full_name, PATHINFO_EXTENSION);

                $product->image = 'images/products/' . $product->name . '.' . $ext;
                $product->save();

                $file = $request->file('image');
                $file->storeAs('public/images/products/', $product->name . '.' . $ext);
            }

            return redirect()->route('admin_products')->with('status','Товар добавлена');
        }

        else{
            return redirect()->back()->with([
                'response' => "Ошибка добавления"
            ]);
        }
    }

   /* public function store(Request $request) {
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
    }*/

}
