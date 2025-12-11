<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $showModal = false;
    public $editMode = false;

    public $productId;
    public $name, $price, $description, $stock;

    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'stock' => 'required|integer|min:0',
    ];

    public function openModal()
    {
        $this->resetFields();
        $this->editMode = false;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function resetFields()
    {
        $this->productId = null;
        $this->name = '';
        $this->price = '';
        $this->description = '';
        $this->stock = '';
    }

    public function saveProduct()
    {
        $this->validate();

        Product::create([
            'name'        => $this->name,
            'price'       => $this->price,
            'description' => $this->description,
            'stock'       => $this->stock,
        ]);

        $this->closeModal();
        session()->flash('message', 'Product Added Successfully!');
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);

        $this->productId   = $product->id;
        $this->name        = $product->name;
        $this->price       = $product->price;
        $this->description = $product->description;
        $this->stock       = $product->stock;

        $this->editMode = true;
        $this->showModal = true;
    }


    public function updateProduct()
    {
        $this->validate();

        Product::find($this->productId)->update([
            'name'        => $this->name,
            'price'       => $this->price,
            'description' => $this->description,
            'stock'       => $this->stock,
        ]);

        $this->closeModal();
        session()->flash('message', 'Product Updated Successfully!');
    }


    public function deleteProduct($id)
    {
        Product::destroy($id);
        session()->flash('message', 'Product Deleted Successfully!');
    }

    public function render()
    {
        return view('livewire.admin.products', [
            'products' => Product::latest()->get()
        ]);
    }
}
