<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilePics extends Model
{
    protected $table = 'profile_pics';

    protected $fillable = [
    'user_id','name','size','original_name','extension','mime',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
