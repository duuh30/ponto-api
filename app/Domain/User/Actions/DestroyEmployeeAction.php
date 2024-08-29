<?php

namespace App\Domain\User\Actions;

use App\Domain\User\Models\User;
use Illuminate\Support\Facades\Gate;

class DestroyEmployeeAction
{
    /**
     * Manager delete the employee
     *
     * @param User $manager
     * @param int $employeeId
     * @return void
     */
    public function execute(User $manager, int $employeeId): void
    {
        $employee = $manager->employees()->find($employeeId);

        Gate::authorize('delete', $employee);

        $employee->delete();
    }
}
