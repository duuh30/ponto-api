<?php

namespace Database\Seeders;

use App\Domain\User\Enum\UserRoleEnum;
use App\Domain\User\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            UserRoleEnum::MANAGER->label(),
            UserRoleEnum::EMPLOYEE->label()
        ];

        foreach($roles as $role) {
            Role::query()->updateOrCreate([
                'name' => $role,
            ]);
        }
    }
}
