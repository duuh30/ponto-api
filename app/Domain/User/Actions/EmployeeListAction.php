<?php

namespace App\Domain\User\Actions;

use App\Domain\User\Models\User;
use Illuminate\Support\Collection;

class EmployeeListAction
{
    public function execute(): Collection
    {
        return User::roleEmployee()->get();
    }
}
