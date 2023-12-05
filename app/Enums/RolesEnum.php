<?php

namespace App\Enums;

use App\Models\User;

enum RolesEnum: string
{
    case SUPER_ADMIN = 'super-admin';
    case ADMIN = 'admin';
    case USER = 'user';

    public function label(): string
    {
        return match ($this) {
            static::SUPER_ADMIN=> 'Super Administrador',
            static::ADMIN => 'Administrador',
            static::USER => 'Usuário',
        };
    }

    public static function countUsers(RolesEnum $role): int 
    {
        return User::role($role->value)->count();
    }
}