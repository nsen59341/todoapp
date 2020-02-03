<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    public $path = '/images/' ;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile_pic', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function task()
    {
        return $this->hasMany('App\Task');
    }
    
    public function getPathAttribute($value)
    {
        return "/images/" . $value ;
    }
     
    public function role() 
    { 
        return $this->belongsTo('App\Role');   
    }
    
    public function isAdmin() {
        if($this->role->name == 'admin')
        {
            return true;
        }
        return false;
    }
}
