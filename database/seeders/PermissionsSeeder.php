<?php

namespace Database\Seeders;

use App\Enums\PermissionsEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $data = $this->data();

        foreach ($data as $value) {
            Permission::create([
                'name' => $value,
            ]);
        }
    }

    public function data()
    {
        return [
            PermissionsEnum::GERENCIAR_USUARIOS,
            PermissionsEnum::GERENCIAR_EVENTOS,
            PermissionsEnum::VISUALIZAR_TODOS_EVENTOS,
            PermissionsEnum::VISUALIZAR_EVENTOS_PROPRIOS,
        ];
    }
        // list of model permission
    //     $model = [
    //         'evento',
    //     ];

    //     foreach ($model as $value) {
    //         foreach ($this->crudActions($value) as $action) {
    //             $data[] = ['name' => $action];
    //         }
    //     }

    //     return $data;
    // }

    // public function crudActions($name)
    // {
    //     $actions = [];
    //     // list of permission actions
    //     $crud = ['create', 'read', 'update', 'delete'];

    //     foreach ($crud as $value) {
    //         $actions[] = $value . ' ' . $name;
    //     }

    //     return $actions;
    // }
}
