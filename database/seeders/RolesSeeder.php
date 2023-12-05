<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Enums\PermissionsEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->data();

        foreach ($data as $value) {
            $role = Role::create([
                'name' => $value['name'],
            ]);
            $role->givePermissionTo($value['permissions']);
        }
    }

    public function data()
    {
        return [
            [
                'name' => RolesEnum::SUPER_ADMIN,
                'permissions' => [
                    PermissionsEnum::GERENCIAR_USUARIOS->value,
                    PermissionsEnum::GERENCIAR_EVENTOS->value,
                    PermissionsEnum::VISUALIZAR_TODOS_EVENTOS->value,
                    PermissionsEnum::VISUALIZAR_EVENTOS_PROPRIOS->value,
                ]
            ],
            [
                'name' => RolesEnum::ADMIN,
                'permissions' => [
                    PermissionsEnum::GERENCIAR_EVENTOS->value,
                    PermissionsEnum::VISUALIZAR_TODOS_EVENTOS->value,
                    PermissionsEnum::VISUALIZAR_EVENTOS_PROPRIOS->value,
                ]
            ],
            [
                'name' => RolesEnum::USER,
                'permissions' => [
                    PermissionsEnum::VISUALIZAR_EVENTOS_PROPRIOS->value,
                ]
            ],
        ];
    }
}
