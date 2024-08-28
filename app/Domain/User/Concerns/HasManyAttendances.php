<?php

namespace App\Domain\User\Concerns;

use App\Domain\Track\Models\Attendance;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyAttendances
{
    /**
     * The user has many attendances relationship
     *
     * @return HasMany<Attendance>
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Return's the daily attendance of user
     *
     * @return HasMany
     */
    public function dailyAttendance(): HasMany
    {
        return $this->attendances()->whereDate('created_at', now());
    }
}
