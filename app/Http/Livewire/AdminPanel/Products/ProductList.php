<?php

namespace App\Http\Livewire\AdminPanel\Products;

use Livewire\Component;

use Illuminate\Database\Eloquent\Collection;

use App\Services\ProductService;

class ProductList extends Component
{
    /** @var Collection */
    public $products;

    protected $listeners = ['load', 'delete'];

    public function render()
    {
        return view('livewire.admin-panel.products.product-list');
    }

    public function load($params = [])
    {
        /** @var ProductService $productService */
        $productService = app(ProductService::class);
        $this->products = $productService->search($params)->get();
    }

    public function delete($id)
    {
        $this->products = $this->products->forget($id);
    }
}
