<?php

namespace App\Http\Livewire\AdminPanel\Products;

use App\Services\ProductService;
use Livewire\Component;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class ProductDelete extends Component
{
    public $modal;

    public $product;

    public function render()
    {
        return view('livewire.admin-panel.products.product-delete');
    }

    public function delete()
    {
        /** @var ProductService $productService */
        $productService = app(ProductService::class);

        $productAux = $this->product;
        $id = $productAux->id;
        $name = $productAux->name;

        $title = __('messages.error');
        $text = __('models/product.messages.error-deleted', compact('name'));
        $icon = 'error';

        try {
            DB::beginTransaction();
            $productService->delete($this->product->id);
            DB::commit();

            $this->emitTo('admin-panel.products.product-list', 'delete', $id);

            $title = __('messages.success');
            $text = __('models/product.messages.deleted', compact('name'));
            $icon = 'success';

            $this->reset('modal');
        } catch (QueryException $qe) {
            DB::rollBack();
            Log::error("Livewire/Components/AdminPanel/Products/ProductDelete/Delete| QueryExceptionMessage: {$qe->getMessage()}");
        }

        $this->emit('alert', [
            'title' => $title,
            'text' => $text,
            'icon' => $icon
        ]);
    }
}
