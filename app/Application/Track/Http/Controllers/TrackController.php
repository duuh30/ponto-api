<?php

namespace App\Application\Track\Http\Controllers;

use App\Application\Track\Http\Resources\AttendanceResource;
use App\Domain\Track\Actions\FillAttendanceAction;
use App\Support\Laravel\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TrackController extends Controller
{
    /**
     * Fill attendance track's time
     *
     * @param FillAttendanceAction $fillAttendanceAction
     * @return AttendanceResource
     */
    public function attendance(FillAttendanceAction $fillAttendanceAction): AttendanceResource
    {
        $attendance = $fillAttendanceAction->execute(
            user: Auth::user()
        );

        return AttendanceResource::make($attendance);
    }
}
