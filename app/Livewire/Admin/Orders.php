<?php

namespace App\Livewire\Admin;

use App\Models\Orderr ;
use Livewire\Component;

class Orders extends Component
{
    public function approve($id)
    {
        $order = Orderr::find($id);
        if ($order) {
            $order->update(['status' => 'Approved']);
        }
    }

    public function decline($id)
    {
        $order = Orderr::find($id);
        if ($order) {
            $order->update(['status' => 'Declined']);
        }
    }

    public function render()
    {
        return view('livewire.admin.orders', [
            'orders' => Orderr::with('product', 'user')->latest()->get()
        ]);
    }
}
