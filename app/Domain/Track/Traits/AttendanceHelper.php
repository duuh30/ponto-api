<?php

namespace App\Domain\Track\Traits;

use App\Domain\Track\Models\Attendance;

trait AttendanceHelper
{
    /**
     * Return which key that has to fill
     *
     * @param Attendance $attendance
     * @return string|null
     */
    public function getNextAttendance(Attendance $attendance): ?string
    {
        return collect([
            'clock_in' => $attendance->clock_in,
            'lunch_out' => $attendance->lunch_out,
            'lunch_in' => $attendance->lunch_in,
            'clock_out' => $attendance->clock_out
        ])
            ->filter(fn ($value) => is_null($value))
            ->keys()
            ->first();
    }
}
