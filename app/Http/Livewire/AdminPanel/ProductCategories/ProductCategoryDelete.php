<?php

namespace App\Http\Livewire\AdminPanel\ProductCategories;

use Livewire\Component;

use App\Models\ProductCategory;
use App\Services\ProductCategoryService;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductCategoryDelete extends Component
{
    public $modal;

    public ProductCategory $productCategory;

    public function render()
    {
        return view('livewire.admin-panel.product-categories.product-category-delete');
    }

    public function delete()
    {
        /** @var ProductCategoryService $productCategoryService */
        $productCategoryService = app(ProductCategoryService::class);

        $productCategoryAux = $this->productCategory;
        $id = $productCategoryAux->id;
        $name = $productCategoryAux->name;

        $title = __('messages.error');
        $text = __('models/product_category.messages.error-deleted', compact('name'));
        $icon = 'error';

        try {
            DB::beginTransaction();
            $productCategoryService->delete($this->productCategory->id);
            DB::commit();

            $this->emitTo('admin-panel.product-categories.product-category-list', 'delete', $id);

            $title = __('messages.success');
            $text = __('models/product_category.messages.deleted', compact('name'));
            $icon = 'success';

            $this->reset('modal');
        } catch (QueryException $qe) {
            DB::rollBack();
            Log::error("Livewire/Components/AdminPanel/ProductCategories/ProductCategoryDelete/Delete| QueryExceptionMessage: {$qe->getMessage()}");
        }

        $this->emit('alert', [
            'title' => $title,
            'text' => $text,
            'icon' => $icon
        ]);
    }
}
