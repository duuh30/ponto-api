<?php

namespace App\Domain\Track\Actions;

use App\Domain\Track\Exceptions\AttendanceException;
use App\Domain\Track\Models\Attendance;
use App\Domain\Track\Traits\AttendanceHelper;
use App\Domain\User\Models\User;
use Illuminate\Support\Facades\DB;

class FillAttendanceAction
{
    use AttendanceHelper;

    public function execute(User $user): Attendance
    {
        /**
         * @var Attendance $attendance
         */
        $attendance = DB::transaction(function () use ($user) {
           return tap($user->dailyAttendance()->firstOrCreate(), function (Attendance $attendance) {
               $nextAttendanceColumn = $this->getNextAttendance($attendance);

               throw_unless($nextAttendanceColumn, AttendanceException::attendanceFilled());

               $attendance->update([
                   $nextAttendanceColumn => now()
               ]);
           });
        });

        return $attendance->fresh();
    }
}
