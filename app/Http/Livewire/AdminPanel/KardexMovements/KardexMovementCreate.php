<?php

namespace App\Http\Livewire\AdminPanel\KardexMovements;

use App\Models\Product;
use Livewire\Component;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Rules\KardexMovement\CheckStock;

use App\Services\ProductService;
use App\Services\KardexMovementService;

use App\Repositories\ProductCategoryRepository;

class KardexMovementCreate extends Component
{
    /** @var Collection */
    public $productCategories;

    /** @var Collection */
    public $products;

    public $product_category_id, $product_id;

    public $kardex_movement_type, $affected_units;

    protected function rules()
    {
        return [
            'product_id' => ['required', 'exists:products,id'],
            'kardex_movement_type' => ['required', 'string'],
            'affected_units' => ['required', 'numeric', new CheckStock($this->product_id, $this->kardex_movement_type), 'min:1'],
        ];
    }

    public function mount()
    {
        $this->loadProductCategories();
        $this->product_category_id = -1;
        $this->loadProducts();
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
            ->prepend(__('models/product.prepend-values.single'), 0);
    }

    public function render()
    {
        return view('livewire.admin-panel.kardex-movements.kardex-movement-create');
    }

    public function save()
    {
        $this->validate();

        /** @var ProductService $productService */
        $productService = app(ProductService::class);

        /** @var Product */
        $product = $productService->search(['id' => $this->product_id])->first();

        /** @var KardexMovementService $kardexMovementService */
        $kardexMovementService = app(KardexMovementService::class);

        $data = $this->only(['product_id', 'kardex_movement_type', 'affected_units']);

        $title = __('messages.error');
        $text = __('models/kardex_movement.messages.error-saved');
        $icon = 'error';

        try {
            DB::beginTransaction();
            $newStock = $productService->changeStock($product->id, $product->stock, $this->affected_units, $this->kardex_movement_type);

            $data['stock_before'] = $product->stock;
            $data['stock_after'] = $newStock;
            $data['movement_at'] = now();

            $kardexMovementService->create($data);
            DB::commit();

            $title = __('messages.success');
            $text = __('models/kardex_movement.messages.saved');
            $icon = 'success';

            $this->reset(['product_id', 'kardex_movement_type', 'affected_units']);
        } catch (QueryException $qe) {
            DB::rollBack();
            Log::error("Livewire/Components/AdminPanel/KardexMovements/KardexMovementCreate/Save| QueryExceptionMessage: {$qe->getMessage()}");
        }

        $this->emit('alert', [
            'title' => $title,
            'text' => $text,
            'icon' => $icon
        ]);
    }
}
