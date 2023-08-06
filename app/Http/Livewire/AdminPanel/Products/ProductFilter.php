<?php

namespace App\Http\Livewire\AdminPanel\Products;

use App\Repositories\ProductCategoryRepository;
use Livewire\Component;

use Illuminate\Database\Eloquent\Collection;

class ProductFilter extends Component
{
    /** @var Collection */
    public $productCategories;

    public $product_category_id, $name;

    public function mount()
    {
        $this->loadProductCategories();
    }

    public function render()
    {
        return view('livewire.admin-panel.products.product-filter');
    }

    public function search()
    {
        $params = array_filter($this->only(['name', 'product_category_id']));
        $this->emitTo('admin-panel.products.product-list', 'load', $params);
    }

    public function loadProductCategories()
    {
        /** @var ProductCategoryRepository $productCategoryRepositroy */
        $productCategoryRepositroy = app(ProductCategoryRepository::class);
        $this->productCategories = $productCategoryRepositroy->all()->pluck('name')
            ->prepend(__('models/product_category.prepend-values.single'));
    }
}
