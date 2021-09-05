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
        'name', 'email', 'password', 'username','role_id','assistance_center_id'
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
        if ($this->isTecn())
            return $this->belongsTo(AssistanceCenter::class);
        else
            return null;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin() {
        if ($this->role!=null)
        {
            if($this->role->name=='admin') {return true;}
            else {return false;}
        }
    }
    public function isStaff() {
        if ($this->role!=null)
        {
            if($this->role->name=='staff') {return true;}
            else {return false;}
        }
    }
    public function isTecn() {
        if ($this->role!=null)
        {
            if($this->role->name=='tecn') {return true;}
            else {return false;}
        }
    }
}
