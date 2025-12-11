<?php

namespace App\Livewire\Admin;

use App\Models\Orderr;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $todaySales = 0;
    public $weekSales = 0;
    public $monthSales = 0;
    public $topProducts = [];

    public function mount()
    {

        $this->todaySales = Orderr::whereDate('created_at', today())
            ->where('status', 'Approved')
            ->sum('total_price');

        $this->weekSales = Orderr::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->where('status', 'Approved')
            ->sum('total_price');

        $this->monthSales = Orderr::whereMonth('created_at', now()->month)
            ->where('status', 'Approved')
            ->sum('total_price');


        $this->topProducts = Orderr::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->where('status', 'Approved')
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->take(5)
            ->get()
            ->map(function ($order) {
                return [
                    'name' => $order->product->name,
                    'sold' => $order->total_sold
                ];
            })
            ->toArray();
    }

    public function render()
    {
        return view('livewire.admin.index');
    }
}
