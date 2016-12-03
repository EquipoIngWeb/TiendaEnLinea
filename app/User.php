<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Comment;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','full_name','email','password','status','confirmation_code','country','address','postal_code','city','phone'
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
	    return $this->belongsTo(Role::class);
	}
	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = bcrypt($password);
	}
	public function comments()
	{
	    return $this->hasMany(Comment::class);
	}
	public function scores()
	{
		return $this->hasMany(Score::class);
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
