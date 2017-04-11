<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    protected $table = 'otp';

    protected $fillable = [
    'mobile','otp','created_at','updated_at','expired_at',
    ];
}
