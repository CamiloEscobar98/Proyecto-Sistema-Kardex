<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Console\Concerns\InteractsWithIO;
use Symfony\Component\Console\Output\ConsoleOutput;

use App\Repositories\UserRepository;

class UserSeeder extends Seeder
{
    use InteractsWithIO;

    /** @var UserRepository */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->output = new ConsoleOutput();
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->info(__('models/user.seeders.title'));
        $this->createDefaultUser();
        if (!isProductionEnv()) {
            $randomNum = (int)$this->command->ask(__('models/user.seeders.ask'), 5);
            $randomNum = !is_numeric($randomNum) || $randomNum <= 0 ? 5 : $randomNum;
            $models = $this->userRepository->makeModels($randomNum);

            $this->command->getOutput()->progressStart(count($models));
            $this->info("\n");
            foreach ($models as $index => $item) {
                $current = $index + 1;
                $name = $item->name;
                $this->info(__('models/user.seeders.saved', compact('current', 'name')));
                $item->save();
            }
            $this->command->getOutput()->progressFinish();
        }
        $this->info(__('models/user.seeders.end'));
    }

    /**
     * Create a default user
     */
    private function createDefaultUser(): void
    {
        $current = 0;
        $item = $this->userRepository->createOneModel([
            'name' => 'Andrés Yáñez',
            'email' => 'camilo_escobar2398@outlook.com',
        ]);
        $name = $item->name;
        $this->info(__('models/user.seeders.saved', compact('current', 'name')));
    }
}
