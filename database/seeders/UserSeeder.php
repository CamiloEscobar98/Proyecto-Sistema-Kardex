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
        $this->info("###CREANDO USUARIOS###");
        $this->createDefaultUser();
        if (!isProductionEnv()) {
            $randomNum = (int)$this->command->ask("¿Cuántos Usuarios desea crear para el 
            ambiente de desarrollo? \nPor defecto se crearán 5 usuarios.", 5);
            $randomNum = !is_numeric($randomNum) || $randomNum <= 0 ? 5 : $randomNum;
            $models = $this->userRepository->makeModels($randomNum);

            $this->command->getOutput()->progressStart(count($models));
            $this->info("\n");
            foreach ($models as $index => $item) {
                $current = $index + 1;
                $this->info("[$current]. Creando Usuario: '{$item->name}'");
                $item->save();
                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
        }
        $this->info("###USUARIOS REGISTRADOS###\n");
    }

    /**
     * Create a default user
     */
    private function createDefaultUser(): void
    {
        $this->info('Creando usuario administrador con todos los permisos registrados de la aplicación.
        Correo Electrónico: camilo_escobar2398@outlook.com Contraseña: password');
        $item = $this->userRepository->createOneModel([
            'name' => 'Andrés Yáñez',
            'email' => 'camilo_escobar2398@outlook.com',
        ]);
        $this->info("\n-Creando Usuario:'{$item->name}'\n");
        // $user->assignRole('admin');
    }
}
