<?php

namespace App\Http\Livewire\AdminPanel\ProductCategories;

use Livewire\Component;

use App\Services\ProductCategoryService;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductCategoryCreate extends Component
{
    public $name;

    protected $rules = [
        'name' => ['required', 'string', 'unique:product_categories'],
    ];

    public function render()
    {
        return view('livewire.admin-panel.product-categories.product-category-create');
    }

    public function save()
    {
        $this->validate();

        /** @var ProductCategoryService $userService */
        $userService = app(ProductCategoryService::class);

        $data = $this->only(['name']);
        $name = $data['name'];

        $title = __('messages.error');
        $text = __('models/product_category.messages.error-saved', compact('name'));
        $icon = 'error';

        try {
            DB::beginTransaction();
            $userService->create($data);
            DB::commit();

            $title = __('messages.success');
            $text = __('models/product_category.messages.saved', compact('name'));
            $icon = 'success';

            $this->reset(['name']);
        } catch (QueryException $qe) {
            DB::rollBack();
            Log::error("Livewire/Components/AdminPanel/ProductCategories/ProductCategoryCreate/Save| QueryExceptionMessage: {$qe->getMessage()}");
        }

        $this->emit('alert', [
            'title' => $title,
            'text' => $text,
            'icon' => $icon
        ]);
    }
}
