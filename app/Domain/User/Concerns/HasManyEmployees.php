<?php

namespace App\Domain\User\Concerns;

use App\Domain\User\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyEmployees
{
    /**
     * Return's the employees relationship
     *
     * @return HasMany
     */
    public function employees(): HasMany
    {
        return $this->hasMany(User::class, 'manager_id');
    }
}
