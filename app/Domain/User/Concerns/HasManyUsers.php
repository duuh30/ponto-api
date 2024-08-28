<?php

namespace App\Domain\User\Concerns;

use App\Domain\User\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyUsers
{
    /**
     * The role has many user relationship
     *
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
