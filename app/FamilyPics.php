<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyPics extends Model
{
    protected $table = 'family_pics';

    protected $fillable = [
    'user_id','name','size','original_name','extension','mime',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
