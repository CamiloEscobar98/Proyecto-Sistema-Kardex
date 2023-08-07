<?php

namespace App\Http\Livewire\AdminPanel\ProductCategories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

use Livewire\Component;

use App\Services\ProductCategoryService;

use App\Models\ProductCategory;

class ProductCategoryEdit extends Component
{
    public ProductCategory $productCategory;

    public $productCategoryId, $name;

    protected function rules()
    {
        return [
            'name' => ['required', 'unique:product_categories,name,' . $this->productCategoryId],
        ];
    }

    public function mount()
    {
        $this->productCategoryId = $this->productCategory->id;
        $this->name = $this->productCategory->name;
    }

    public function render()
    {
        return view('livewire.admin-panel.product-categories.product-category-edit');
    }

    public function update()
    {
        $this->validate();

        /** @var ProductCategoryService $productCategoryService */
        $productCategoryService = app(ProductCategoryService::class);

        $data = $this->only(['name']);
        $name = $data['name'];

        $title = __('messages.error');
        $text = __('models/product_category.messages.error-updated', compact('name'));
        $icon = 'error';

        try {
            DB::beginTransaction();
            $productCategoryService->update($this->productCategoryId, $data);
            DB::commit();

            $title = __('messages.success');
            $text = __('models/product_category.messages.updated', compact('name'));
            $icon = 'success';
        } catch (QueryException $qe) {
            DB::rollBack();
            Log::error("Livewire/Components/ProductCategories/ProductCategoryEdit/Update| QueryExceptionMessage: {$qe->getMessage()}");
        }

        $this->emit('alert', [
            'title' => $title,
            'text' => $text,
            'icon' => $icon
        ]);
    }
}
