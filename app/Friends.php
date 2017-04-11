<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    protected $table = 'friends';

    protected $fillable = [
    'user_id_1','user_id_2',
    ];

    public function ScopeAreFriends($query,$id1,$id2){
    	return $query->where('user_id_1',$id1)->where('user_id_2',$id2)->orWhere('user_id_1',$id2)->where('user_id_2',$id1);
    }

}
