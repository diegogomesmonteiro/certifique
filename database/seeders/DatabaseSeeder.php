<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            AtividadeTipoSeeder::class,
            PerfilSeeder::class,
            EventoSeeder::class,
            AtividadeSeeder::class,
            // PermissionsSeeder::class,
            // RolesSeeder::class,
        ]);
    }
}
