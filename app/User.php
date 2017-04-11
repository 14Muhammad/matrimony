<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password','gender','dob','age','reg_step','mobile','mothertongue','religion','caste','subcaste','manglik','marital_status','city','state','country','feet','inches','degree','occupation_type','occupation','income','familytype','occfather','occmother','sisters','brothers','address','aboutfamily','aboutself','slug','rand_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeWithSlug($query,$slug){
        return $query->where('slug',$slug);
    }

    public function scopeWithRandomId($query,$id){
        return $query->where('rand_name',$id);
    }

    public function sent(){
        return $this->hasMany('App\Request','user_id','id');
    }

    public function received(){
        return $this->hasMany('App\Request','recipient_id','id');
    }

    public function filters(){
        return $this->hasOne('App\Filters');
    }

    public function profile_pic(){
        return $this->hasOne('App\ProfilePics');
    }

    public function family_pics(){
        return $this->hasMany('App\FamilyPics');
    }
}
