<?php

namespace App\Domain\User\Concerns;

use App\Domain\User\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
