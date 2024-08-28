<?php

namespace App\Domain\Address\Models;

use App\Domain\Address\Concerns\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use BelongsToUser;

    protected $table = "user_address";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'zip_code',
        'state',
        'city',
        'neighborhood',
        'street',
    ];
}
