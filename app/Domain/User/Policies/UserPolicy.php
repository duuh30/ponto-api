<?php

namespace App\Domain\User\Policies;

use App\Domain\User\Models\User;

class UserPolicy
{
    /**
     * Determine if the given post can be destroyed by the user.
     */
    public function delete(User $manager, User $employee): bool
    {
        return $employee->manager()->is($manager);
    }
}
