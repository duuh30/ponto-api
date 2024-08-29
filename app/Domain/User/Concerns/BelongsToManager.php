<?php

namespace App\Domain\User\Concerns;

use App\Domain\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToManager
{
    /**
     * The user belongs to manager relationship
     *
     * @return BelongsTo
     */
    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
}
