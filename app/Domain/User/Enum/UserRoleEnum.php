<?php

namespace App\Domain\User\Enum;

enum UserRoleEnum: int
{
    case MANAGER = 1;
    case EMPLOYEE = 2;

    /**
     * Parse Roles to Label
     *
     * @return string
     */
    public function label(): string
    {
        return match($this->value) {
            self::MANAGER->value => 'manager',
            self::EMPLOYEE->value => 'employee',
        };
    }
}
