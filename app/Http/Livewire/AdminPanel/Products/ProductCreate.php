<?php

namespace App\Http\Livewire\AdminPanel\Products;

use Livewire\Component;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule;

use App\Services\ProductService;

use App\Repositories\ProductCategoryRepository;

class ProductCreate extends Component
{
    /** @var Collection */
    public $productCategories;

    public $product_category_id;

    public $name, $description, $price, $stock;

    protected function rules()
    {
        return [
            'name' => [
                'required', 'string',
                Rule::unique('products', 'name')->where(function ($query) {
                    return $query->where('product_category_id', $this->product_category_id);
                })
            ],
            'product_category_id' => ['required', 'exists:product_categories,id'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'min:0'],
            'stock' => ['required', 'numeric', 'min:0']
        ];
    }

    public function mount()
    {
        $this->loadProductCategories();
    }

    public function render()
    {
        return view('livewire.admin-panel.products.product-create');
    }

    public function save()
    {
        $this->validate();

        /** @var ProductService $productService */
        $productService = app(ProductService::class);

        $data = $this->only(['product_category_id', 'name', 'description', 'price', 'stock']);
        $name = $data['name'];

        $title = __('messages.error');
        $text = __('models/product.messages.error-saved', compact('name'));
        $icon = 'error';

        try {
            DB::beginTransaction();
            $productService->create($data);
            DB::commit();

            $title = __('messages.success');
            $text = __('models/product.messages.saved', compact('name'));
            $icon = 'success';

            $this->reset(['name']);
        } catch (QueryException $qe) {
            DB::rollBack();
            Log::error("Livewire/Components/AdminPanel/Products/ProductCreate/Save| QueryExceptionMessage: {$qe->getMessage()}");
        }

        $this->emit('alert', [
            'title' => $title,
            'text' => $text,
            'icon' => $icon
        ]);
    }

    public function loadProductCategories()
    {
        /** @var ProductCategoryRepository $productCategoryRepositroy */
        $productCategoryRepositroy = app(ProductCategoryRepository::class);
        $this->productCategories = $productCategoryRepositroy->all()->pluck('name', 'id')
            ->prepend(__('models/product_category.prepend-values.single'), 0);
    }
}
