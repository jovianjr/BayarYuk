<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use Uuids;
    const CREATED_AT = 'created_at';

    public $incrementing = false;

    protected $keyType = 'uuid';
}
