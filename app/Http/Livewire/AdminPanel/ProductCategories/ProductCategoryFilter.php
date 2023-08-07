<?php

namespace App\Http\Livewire\AdminPanel\ProductCategories;

use Livewire\Component;

class ProductCategoryFilter extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.admin-panel.product-categories.product-category-filter');
    }

    public function search()
    {
        $params = array_filter($this->only(['name']));
        $this->emitTo('admin-panel.product-categories.product-category-list', 'load', $params);
    }
}
