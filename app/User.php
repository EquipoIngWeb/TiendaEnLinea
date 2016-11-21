<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','full_name','email','password','status','confirmation_code'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'type', 'remember_token',
    ];
	public function role()
	{
	    return $this->belongsTo(Role::class, 'role_id', 'id');
	}
	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = bcrypt($password);
	}
	public function comments()
	{
	    return $this->hasMany('App\Comment', 'user_id', 'id');
	}

	public function isAdmin()
	{
		return $this->attributes['role_id'] == "admin";
	}
	public function isUser()
	{
		return $this->attributes['role_id'] == "user";
	}
}
