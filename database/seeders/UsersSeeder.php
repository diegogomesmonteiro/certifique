<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\User;
use App\Models\UserInfo;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $superAdmin = User::create([
            'first_name'        => 'Diego',
            'last_name'         => 'Gomes Monteiro',
            'email'             => 'admin@ifnmg.edu.br',
            'password'          => Hash::make('teste@123'),
            'email_verified_at' => now(),
        ]);
        $superAdmin->assignRole([
            RolesEnum::SUPER_ADMIN->value,
        ]);
        $this->addDummyInfo($faker, $superAdmin);

        $admin = User::create([
            'first_name'        => $faker->firstName,
            'last_name'         => $faker->lastName,
            'email'             => 'demo@demo.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
        ]);
        $admin->assignRole([
            RolesEnum::ADMIN->value,
        ]);
        $this->addDummyInfo($faker, $admin);


        User::factory(100)->create()->each(function (User $user) use ($faker) {
            $user->assignRole(RolesEnum::USER->value);
            $this->addDummyInfo($faker, $user);
        });
    }

    private function addDummyInfo(Generator $faker, User $user)
    {
        $dummyInfo = [
            'cpf'      => $faker->cpf(),
            'phone'    => $faker->phoneNumber,
        ];

        $info = new UserInfo();
        foreach ($dummyInfo as $key => $value) {
            $info->$key = $value;
        }
        $info->user()->associate($user);
        $info->save();
    }
}
