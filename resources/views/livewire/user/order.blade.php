<div class="p-6 bg-white shadow rounded-lg">
    <h2 class="text-xl font-bold mb-4 text-blue-600">Your Orders</h2>

    @if($orders && $orders->count())
        <table class="w-full text-sm border">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="p-2">Order ID</th>
                    <th class="p-2">Product</th>
                    <th class="p-2">Amount</th>
                    <th class="p-2">Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($orders as $order)
                    <tr class="border-b">
                        <td class="p-2 text-center">{{ $order->id }}</td>

                        <td class="p-2 text-center">
                            {{ $order->product->name ?? 'N/A' }}
                        </td>

                        <td class="p-2 text-center">
                            ₱{{ number_format($order->product->price * $order->quantity, 2) }}
                        </td>

                        <td class="p-2 text-center">
                            <span class="px-3 py-1 rounded-full
                                @if($order->status=='pending') bg-yellow-100 text-yellow-600
                                @elseif($order->status=='completed') bg-green-100 text-green-600
                                @else bg-gray-100 text-gray-600
                                @endif
                            ">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-500 text-center py-4">No orders found.</p>
    @endif
</div>
