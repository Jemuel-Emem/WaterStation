<div class="p-6">

    <h1 class="text-2xl font-semibold mb-4">Orders List</h1>

    <table class="w-full bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Customer</th>
                 <th class="px-4 py-2 text-left">Phone Number</th>
                <th class="px-4 py-2 text-left">Product</th>
                <th class="px-4 py-2 text-left">Qty</th>
                <th class="px-4 py-2 text-left">Total</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-center">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $order)
                <tr class="border-b">
                    <td class="px-4 py-2">
                        {{ $order->user->name }}
                    </td>

                         <td class="px-4 py-2">
                        {{ $order->user->phone_number }}
                    </td>

                    <td class="px-4 py-2">
                        {{ $order->product->name }}
                    </td>

                    <td class="px-4 py-2">
                        {{ $order->quantity }}
                    </td>

                    <td class="px-4 py-2">
                        ₱{{ number_format($order->total_price, 2) }}
                    </td>

                    <td class="px-4 py-2">
                        <span class="
                            px-3 py-1 rounded-full text-white text-sm
                            @if($order->status === 'Pending') bg-yellow-500
                            @elseif($order->status === 'Approved') bg-green-600
                            @elseif($order->status === 'Declined') bg-red-600
                            @endif">
                            {{ $order->status }}
                        </span>
                    </td>

                    <td class="px-4 py-2 text-center flex justify-center gap-3">

                        @if($order->status === 'Pending')
                            <button
                                wire:click="approve({{ $order->id }})"
                                class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">
                                Approve
                            </button>

                            <button
                                wire:click="decline({{ $order->id }})"
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                Decline
                            </button>
                        @else
                            <span class="text-gray-500">Completed</span>
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
