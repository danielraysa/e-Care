<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];
    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function user_role()
    {
        return $this->hasOne(UserRole::class, 'user_id');
        // return $this->belongsTo(UserRole::class, 'id', 'user_id');
    }

    public function sensor_nama()
    {
        return substr($this->name, 0, 1) . preg_replace('/[^@]/', '*', substr($this->name, 1));
    }

    public function last_appointment()
    {
        return $this->hasOne(Appointment::class, 'user_id');
    }
    
}
