<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Services\ProductCategoryService;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /** @var ProductCategoryService */
    protected $productCategoryService;

    public function __construct(ProductCategoryService $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategories = $this->productCategoryService->search()->get();
        return view('pages.admin_panel.product_categories.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin_panel.product_categories.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productCategory = $this->productCategoryService->search(compact('id'))->first();
        return view('pages.admin_panel.product_categories.show', compact('productCategory'));
    }
}
