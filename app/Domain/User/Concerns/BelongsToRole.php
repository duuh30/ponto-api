<?php

namespace App\Domain\User\Concerns;

use App\Domain\User\Enum\UserRoleEnum;
use App\Domain\User\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

trait BelongsToRole
{
    /**
     * The user belongs to role relationship
     *
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Apply scope of all employee users
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeRoleEmployee(Builder $query): Builder
    {
        return $query->where('role_id', UserRoleEnum::EMPLOYEE);
    }
}
