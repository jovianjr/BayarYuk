<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use Uuids;
    const CREATED_AT = 'created_at';

    public $incrementing = false;

    protected $keyType = 'uuid';


    protected $fillable = [
        'name',
        'email',
        'phone_number',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
