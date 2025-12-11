<div class="p-4">

    <!-- SUCCESS MESSAGE -->
    @if(session('message'))
        <div class="mb-4 p-3 bg-green-200 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif

    <!-- ADD PRODUCT BUTTON -->
    <button wire:click="openModal"
        class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
        + Add Product
    </button>


    <!-- PRODUCT TABLE -->
    <div class="mt-6">
        <table class="w-full text-left border">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="p-2">#</th>
                    <th class="p-2">Name</th>
                    <th class="p-2">Price</th>
                    <th class="p-2">Stock</th>
                    <th class="p-2">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                <tr class="border-b">
                    <td class="p-2">{{ $product->id }}</td>
                    <td class="p-2">{{ $product->name }}</td>
                    <td class="p-2">₱{{ number_format($product->price, 2) }}</td>
                    <td class="p-2">{{ $product->stock }}</td>
                    <td class="p-2 flex gap-3">
                        <button wire:click="editProduct({{ $product->id }})"
                            class="px-3 py-1 bg-yellow-500 text-white rounded">
                            Edit
                        </button>

                        <button wire:click="deleteProduct({{ $product->id }})"
                            class="px-3 py-1 bg-red-600 text-white rounded"
                            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>




    <!-- MODAL -->
    @if($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">

            <div class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg">

                <!-- HEADER -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold text-blue-700">
                        {{ $editMode ? 'Edit Product' : 'Add Product' }}
                    </h2>
                    <button wire:click="closeModal">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>

                <!-- BODY -->
                <div class="space-y-3">

                    <div>
                        <label class="text-gray-600 text-sm">Name</label>
                        <input wire:model="name" type="text" class="w-full border rounded p-2">
                        @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="text-gray-600 text-sm">Price</label>
                        <input wire:model="price" type="number" step="0.01" class="w-full border rounded p-2">
                        @error('price') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="text-gray-600 text-sm">Description</label>
                        <textarea wire:model="description" class="w-full border rounded p-2"></textarea>
                        @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="text-gray-600 text-sm">Stock</label>
                        <input wire:model="stock" type="number" class="w-full border rounded p-2">
                        @error('stock') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                </div>

                <!-- FOOTER -->
                <div class="mt-4 flex justify-end gap-3">

                    <button wire:click="closeModal" class="px-3 py-2 bg-gray-300 rounded">
                        Cancel
                    </button>

                    @if($editMode)
                        <button wire:click="updateProduct"
                            class="px-3 py-2 bg-yellow-500 text-white rounded">
                            Update
                        </button>
                    @else
                        <button wire:click="saveProduct"
                            class="px-3 py-2 bg-blue-600 text-white rounded">
                            Save
                        </button>
                    @endif

                </div>

            </div>
        </div>
    @endif

</div>
