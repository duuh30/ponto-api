<?php

namespace App\Domain\Address\Models;

use App\Support\Core\Concerns\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes,
        BelongsToUser;

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
