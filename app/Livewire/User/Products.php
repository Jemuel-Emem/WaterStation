<?php

namespace App\Livewire\User;

use App\Models\Product;
use App\Models\Orderr as Order;
use Livewire\Component;

class Products extends Component
{
    public $selectedProduct;
    public $quantity = 1;
    public $showOrderModal = false;

    public function confirmOrder($productId)
    {
        $this->selectedProduct = Product::find($productId);
        $this->quantity = 1;
        $this->showOrderModal = true;
    }

  public function placeOrder()
{
    if (!auth()->check()) {
        session()->flash('error', 'You must be logged in to place an order.');
        return;
    }

    if ($this->quantity < 1) {
        $this->quantity = 1;
    }

    if ($this->quantity > $this->selectedProduct->stock) {
        session()->flash('error', 'Not enough stock available.');
        return;
    }

Order::create([
    'user_id' => auth()->id(),
    'product_id' => $this->selectedProduct->id,
    'quantity' => $this->quantity,
    'total_price' => $this->selectedProduct->price * $this->quantity,
    'status' => 'Pending',
]);


    $this->selectedProduct->decrement('stock', $this->quantity);

    session()->flash('message', 'Order placed successfully!');

    $this->showOrderModal = false;
}

    public function render()
    {
        return view('livewire.user.products', [
            'products' => Product::all()
        ]);
    }
}
