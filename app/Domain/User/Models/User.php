<?php

namespace App\Domain\User\Models;

use App\Domain\User\Concerns\BelongsToManager;
use App\Domain\User\Concerns\BelongsToRole;
use App\Domain\User\Concerns\HasAddress;
use App\Domain\User\Concerns\HasManyAttendances;
use App\Domain\User\Concerns\HasManyEmployees;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory,
        Notifiable,
        BelongsToRole,
        HasAddress,
        HasApiTokens,
        HasManyAttendances,
        BelongsToManager,
        HasManyEmployees;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'manager_id',
        'name',
        'email',
        'password',
        'birthday',
        'cpf',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
