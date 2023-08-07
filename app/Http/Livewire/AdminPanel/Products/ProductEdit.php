<?php

namespace App\Http\Livewire\AdminPanel\Products;

use Livewire\Component;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

use App\Services\ProductService;

use App\Repositories\ProductCategoryRepository;

use App\Models\Product;

class ProductEdit extends Component
{
    public Product $product;

    public $productId;

    /** @var Collection */
    public $productCategories;

    public $product_category_id;

    public $name, $description, $price;

    protected function rules()
    {
        return [
            'name' => [
                'required', 'string',
                Rule::unique('products', 'name')->where(function ($query) {
                    return $query->where('product_category_id', $this->product_category_id);
                })->ignore($this->productId)
            ],
            'product_category_id' => ['required', 'exists:product_categories,id'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'min:0'],
        ];
    }

    public function mount()
    {
        $this->productId = $this->product->id;
        $this->name = $this->product->name;
        $this->product_category_id = $this->product->product_category_id;
        $this->description = $this->product->description;
        $this->price = $this->product->price;
        $this->loadProductCategories();
    }

    public function render()
    {
        return view('livewire.admin-panel.products.product-edit');
    }

    public function update()
    {
        $this->validate();

        /** @var ProductService $productService */
        $productService = app(ProductService::class);

        $data = $this->only(['product_category_id', 'name', 'description', 'price']);
        $name = $data['name'];

        $title = __('messages.error');
        $text = __('models/product.messages.error-updated', compact('name'));
        $icon = 'error';

        try {
            DB::beginTransaction();
            $productService->update($this->productId, $data);
            DB::commit();

            $title = __('messages.success');
            $text = __('models/product.messages.updated', compact('name'));
            $icon = 'success';
        } catch (QueryException $qe) {
            DB::rollBack();
            Log::error("Livewire/Components/Products/ProductEdit/Update| QueryExceptionMessage: {$qe->getMessage()}");
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
