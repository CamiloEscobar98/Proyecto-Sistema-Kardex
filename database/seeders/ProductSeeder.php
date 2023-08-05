<?php

namespace Database\Seeders;

use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Console\Concerns\InteractsWithIO;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class ProductSeeder extends Seeder
{
    use InteractsWithIO;

    /** @var ProductRepository */
    protected $productRepository;

    /** @var ProductCategoryRepository */
    protected $productCategoryRepository;

    public function __construct(ProductRepository $productRepository, ProductCategoryRepository $productCategoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->productCategoryRepository = $productCategoryRepository;
        $this->output = new ConsoleOutput();
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->info("###CREANDO PRODUCTOS###");
        if (!isProductionEnv()) {
            $randomNum = (int)$this->command->ask("¿Cuántos Productos desea crear para el 
            ambiente de desarrollo? \nPor defecto se crearán 5 Productos.", 5);
            $randomNum = !is_numeric($randomNum) || $randomNum <= 0 ? 5 : $randomNum;
            $models = $this->productRepository->makeModels($randomNum);

            $productCategories = $this->productCategoryRepository->all();

            $this->command->getOutput()->progressStart(count($models));
            $this->info("\n");
            foreach ($models as $index => $item) {
                $randomProductCategory = $productCategories->random(1)->first();
                $current = $index + 1;
                $this->info("[$current]. Creando Producto: '{$item->name}'");

                /** @var \App\Models\Product $item */
                $item->product_category_id = $randomProductCategory->id;
                $item->save();
                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
        }
        $this->info("###PRODUCTOS REGISTRADOS###\n");
    }
}
