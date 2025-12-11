<div class="p-6">


    @if(session()->has('message'))
        <div class="mb-3 p-3 bg-green-500 text-white rounded">
            {{ session('message') }}
        </div>
    @endif


    @if(session()->has('error'))
        <div class="mb-3 p-3 bg-red-500 text-white rounded">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($products as $product)
            <div class="border rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                <p class="text-gray-600">{{ $product->description }}</p>

                <p class="text-lg font-bold mt-2">₱{{ number_format($product->price, 2) }}</p>

                <p class="text-sm text-gray-500">Stock: {{ $product->stock }}</p>

                <button wire:click="confirmOrder({{ $product->id }})"
                    class="mt-3 bg-blue-600 text-white px-4 py-2 rounded w-full">
                    Order Now
                </button>
            </div>
        @endforeach
    </div>


    @if($showOrderModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded shadow-lg w-96">

                <h2 class="text-xl font-semibold mb-3">Confirm Order</h2>

                <p><strong>Product:</strong> {{ $selectedProduct->name }}</p>
                <p><strong>Price:</strong> ₱{{ number_format($selectedProduct->price, 2) }}</p>
                <p><strong>Available Stock:</strong> {{ $selectedProduct->stock }}</p>

                <div class="mt-3">
                    <label class="font-semibold">Quantity</label>
                    <input type="number" min="1" wire:model="quantity"
                        class="w-full border px-2 py-1 rounded mt-1">
                </div>

                <p class="mt-3 font-semibold">
                    Total: ₱{{ number_format($selectedProduct->price * $quantity, 2) }}
                </p>

                <div class="flex justify-end mt-4 gap-2">
                    <button wire:click="$set('showOrderModal', false)"
                        class="px-4 py-2 bg-gray-400 text-white rounded">
                        Cancel
                    </button>

                    <button wire:click="placeOrder"
                        class="px-4 py-2 bg-green-600 text-white rounded">
                        Confirm Order
                    </button>
                </div>

            </div>
        </div>
    @endif
</div>
