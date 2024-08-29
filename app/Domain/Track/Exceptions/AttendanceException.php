<?php

namespace App\Domain\Track\Exceptions;

use Exception;

class AttendanceException extends Exception
{
    public static function attendanceFilled(): static
    {
        return new static('Daily Attendance has already been filled');
    }
}
