<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CountProductBasket extends Component
{
    public $count;

    protected $listeners = ['freshCountProduct'];

    public function freshCountProduct(): void
    {
        $this->mount();
    }

    public function mount(): void
    {
        $this->count = count(session('cart') ?? []);
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <span class="position-absolute top-0 start-1 end-100 translate-middle badge rounded-pill bg-danger">
                    {{ $count }}
                    <span class="visually-hidden">unread messages</span>
                </span>
            </div>
        blade;
    }
}
