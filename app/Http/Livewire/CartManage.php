<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CartManage extends Component
{
    public $cart, $totalAllProduct;

    public function mount(): void
    {
        $this->cart = session('cart');

        $this->freshTotal();
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function increment($id): void
    {
        $cart = session()->get('cart');

        ++$this->cart[$id]["quantity"];


        ++$cart[$id]["quantity"];

        $product = Product::findOrFail($id);

        $product->update(['amount' => --$product->amount]);


        session()->put('cart', $cart);
        session()->flash('success', 'Корзина успешно обновлена');

        $this->mount();
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function decrement($id): void
    {
        $cart = session()->get('cart');

        --$this->cart[$id]["quantity"];

        --$cart[$id]["quantity"];

        $product = Product::findOrFail($id);

        $product->update(['amount' => ++$product->amount]);

        session()->put('cart', $cart);
        session()->flash('success', 'Корзина успешно обновлена');

        $this->mount();
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function remove($id): void
    {
        $cart = session()->get('cart');

        $product = Product::findOrFail($id);

        $product->update(['amount' => $product->amount + $cart[$id]['quantity']]);

        if (isset($cart[$id])) {
            unset($cart[$id]);

            unset($this->cart[$id]);

            session()->put('cart', $cart);
        }
        $this->freshTotal();

        session()->flash('success', 'Продукт успешно удален');
    }

    public function render()
    {
        return view('livewire.cart-manage')
            ->extends('layout')
            ->section('page-content');
    }

    public function freshTotal(): void
    {
        $total = 0;

        if (!empty($this->cart)){
            $res = array_map(function ($details) use ($total) {
                return $total += $details['price'] * $details['quantity'];
            }, $this->cart);

            $this->totalAllProduct = array_sum($res);

            $this->emit('freshCountProduct');
        }else{
            $this->totalAllProduct = 0;

            $this->emit('freshCountProduct');
        }
    }

}
