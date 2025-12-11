<?php

namespace App\Livewire\User;

use App\Models\Orderr;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Order extends Component
{
public function render()
{
    $orders = Orderr::with('product')
        ->where('user_id', Auth::id())
        ->get();

    return view('livewire.user.order', compact('orders'));
}

}
