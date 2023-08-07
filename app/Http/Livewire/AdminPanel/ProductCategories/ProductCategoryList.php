<?php

namespace App\Http\Livewire\AdminPanel\ProductCategories;

use Livewire\Component;

use App\Services\ProductCategoryService;

class ProductCategoryList extends Component
{
    /** @var Collection */
    public $productCategories;

    protected $listeners = ['load', 'delete'];


    public function render()
    {
        return view('livewire.admin-panel.product-categories.product-category-list');
    }

    public function load($params = [])
    {
        /** @var ProductCategoryService $productCategoryService */
        $productCategoryService = app(ProductCategoryService::class);
        $this->productCategories = $productCategoryService->search($params)->get();
    }

    public function delete($id)
    {
        $this->productCategories = $this->productCategories->forget($id);
    }
}
