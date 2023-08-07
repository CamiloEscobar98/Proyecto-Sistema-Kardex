<?php

namespace App\Rules\KardexMovement;

use Closure;

use Illuminate\Contracts\Validation\ValidationRule;

use App\Services\ProductService;

use App\Models\Product;

class CheckStock implements ValidationRule
{
    protected $productId, $kandexMovementType;

    /** @var ProductService */
    protected $productService;

    public function __construct($productId, $kandexMovementType = 1)
    {
        $this->productId = $productId;
        $this->kandexMovementType = $kandexMovementType;
        $this->productService = app(ProductService::class);
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        /** @var Product */
        $product = $this->productService->search(['id' => $this->productId])->first();
        $stockCurrent = $product->stock;

        switch ($this->kandexMovementType) {
            case '2': # Output
                $stockAfter = $stockCurrent - $value;
                if ($stockAfter < 0) {
                    $max = $stockCurrent;
                    $fail('validation.max.numeric')->translate(compact('max'));
                }
                break;
        }
    }
}
