<?php

namespace Database\Seeders;

use App\Repositories\ProductCategoryRepository;
use Illuminate\Console\Concerns\InteractsWithIO;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class ProductCategorySeeder extends Seeder
{
    use InteractsWithIO;

    /** @var ProductCategoryRepository */
    protected $productCategoryRepository;

    public function __construct(ProductCategoryRepository $productCategoryRepository)
    {
        $this->productCategoryRepository = $productCategoryRepository;
        $this->output = new ConsoleOutput();
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->info("###CREANDO CATEGORÍAS DE PRODUCTOS###");
        if (!isProductionEnv()) {
            $randomNum = (int)$this->command->ask("¿Cuántas Categorías de Productos desea crear para el 
            ambiente de desarrollo? \nPor defecto se crearán 5 Categorías de Productos.", 5);
            $randomNum = !is_numeric($randomNum) || $randomNum <= 0 ? 5 : $randomNum;
            $models = $this->productCategoryRepository->makeModels($randomNum);

            $this->command->getOutput()->progressStart(count($models));
            $this->info("\n");
            foreach ($models as $index => $item) {
                $current = $index + 1;
                $this->info("[$current]. Creando Categoría de Productos: '{$item->name}'");
                $item->save();
                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
        }
        $this->info("###CATEGORÍAS DE PRODUCTOS REGISTRADOS###\n");
    }
}
