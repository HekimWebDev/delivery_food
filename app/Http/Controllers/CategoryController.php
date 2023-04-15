<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class CategoryController extends Controller
{
    public function index() {
        if(Auth()->user()) {
            $categories = Category::paginate(10);
            return view('admin.categories')->with(
                [
                    'categories'=>$categories,
                    'page_title'=>'Категории'
                ]
            );
        } else {
            abort(403);
        }
    }


    public function add(Request $request) {
        if(Auth()->user()) {
            if($request->isMethod('post')){
                try {
                    $result = $request->all();

                    $validator = Validator::make($result,[
                        'name'=>'required',
                        'description'=>'required',
                    ]);
                    
                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $category = new \App\Category([
                        'name' => $result['name'],
                        'description' => $result['description'],
                    ]);
                    $category->save();

                    return redirect()->route('admin_categories')->with('status','Категория добавлена');
                }

                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка добавления: ' . $e->getMessage());
                }
            }

            return view('admin.add_category')->with([
                'page_title'=>'Новая категория',
            ]);
        } else {
            abort(403);
        }
    }
}
