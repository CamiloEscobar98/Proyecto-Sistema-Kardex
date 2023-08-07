<?php

namespace App\Http\Livewire\AdminPanel\KardexMovements;

use App\Repositories\ProductCategoryRepository;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

use App\Services\ProductService;

class KardexMovementFilter extends Component
{
    /** @var Collection */
    public $productCategories;

    /** @var Collection */
    public $products;

    public $product_category_id, $product_id;

    public $name;

    public function mount()
    {
        $this->loadProductCategories();
        $this->product_category_id = -1;
        $this->loadProducts();
    }

    public function render()
    {
        return view('livewire.admin-panel.kardex-movements.kardex-movement-filter');
    }

    public function search()
    {
        $params = array_filter($this->only(['name', 'product_category_id']));
        $this->emitTo('admin-panel.kardex-movements.kardex-movement-list', 'load', $params);
    }

    public function loadProductCategories()
    {
        /** @var ProductCategoryRepository $productCategoryRepositroy */
        $productCategoryRepositroy = app(ProductCategoryRepository::class);
        $this->productCategories = $productCategoryRepositroy->all()->pluck('name', 'id')
            ->prepend(__('models/product_category.prepend-values.single'), 0);
    }

    public function loadProducts()
    {
        /** @var ProductService $productService */
        $productService = app(ProductService::class);
        $this->products = $productService->search(['product_category_id' => $this->product_category_id])->pluck('name', 'id')
            ->prepend(__('models/product_category.prepend-values.single'), 0);
    }
}
