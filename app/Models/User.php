<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username',
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

    public function assistanceCenter()
    {
        //probabilmente questo if è inutile
        if ($this->hasRole('tecn'))
            return $this->belongsTo(Assistance_center::class);
        else
            return null;
    }

    public function hasRole($role) {
        $role = (array)$role;
        return in_array($this->role, $role);
    }

    public function isStaff() {
        if($this->role=='staff') {return true;}
        else {return false;}
    }
    public function isAdmin() {
        if($this->role=='admin') {return true;}
        else {return false;}
    }
}
