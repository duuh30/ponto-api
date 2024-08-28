<?php

namespace Database\Seeders;

use App\Domain\User\Enum\UserRoleEnum;
use App\Domain\User\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role_id' => UserRoleEnum::MANAGER->value,
            'cpf' => '123.123.123-19'
        ];

        User::create($user);
    }
}
