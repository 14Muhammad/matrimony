<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filters extends Model
{
    protected $table = 'filters';

    protected $fillable = [
    'user_id', 'name', 'age', 'mobile', 'degree', 'occupation_type', 'marital_status', 'occupation', 'income',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
