<?php

namespace App\Domain\User\Concerns;

use App\Domain\Address\Models\Address;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasAddress
{
    /**
     * The user has Address Relationship
     *
     * @return HasOne
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }
}
