<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'request';

    protected $fillable = [
    'user_id','recipient_id','status',
    ];

    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }
    public function recipient(){
    	return $this->hasOne('App\User','id','recipient_id');
    }
    public function ScopeAccepted($query){
        return $query->where('status',1);
    }
    public function ScopePending($query){
        return $query->where('status',0);
    }
    public function ScopeRejected($query){
        return $query->where('status',2);
    }
    public function ScopeSentBy($query,$id){
        return $query->where('user_id',$id);
    }
    public function ScopeReceivedBy($query,$id){
        return $query->where('user_id',$id);
    }
    public function ScopeHaveRequest($query,$id1,$id2){
        return $query->where('user_id',$id1)->where('recipient_id',$id2)->orWhere('user_id',$id2)->where('recipient_id',$id1);
    }
       
}