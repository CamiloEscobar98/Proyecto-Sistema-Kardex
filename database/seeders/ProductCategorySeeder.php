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
        $this->info(__('models/product_category.seeders.title'));
        if (!isProductionEnv()) {
            $randomNum = (int)$this->command->ask(__('models/product_category.seeders.ask'), 5);
            $randomNum = !is_numeric($randomNum) || $randomNum <= 0 ? 5 : $randomNum;
            $models = $this->productCategoryRepository->makeModels($randomNum);

            $this->command->getOutput()->progressStart(count($models));
            $this->info("\n");
            foreach ($models as $index => $item) {
                $current = $index + 1;
                $name = $item->name;
                $this->info(__('models/product_category.seeders.saved', compact('current', 'name')));
                $item->save();
            }
            $this->command->getOutput()->progressFinish();
        }
        $this->info(__('models/product_category.seeders.end'));
    }
}
