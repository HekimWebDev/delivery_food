<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ProductsController extends Controller
{
    public function detail($id)
    {
        $product = Product::findOrFail($id);

        return view('products.detail', compact('product'));
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                'stock' => $product->amount,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        $product->update(['amount' => --$product->amount]);

        return redirect()->back()->with('success', 'Товар успешно добавлен в корзину!');
    }
}
