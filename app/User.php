<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Cache;
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

    public function isOnline()
    {
        return Cache::has('user-online-'.$this->id);
    }

    public function lastSeenOnline()
    {
        if(Cache::has('last-user-online-'.$this->id))
            return 'Terakhir '.Cache::get('last-user-online-'.$this->id);
        else
            return 'Offline';
    }

    public function foto_user()
    {
        $nomor = rand(1,26);
        return asset('assets/backend/app-assets/images/portrait/small/avatar-s-'.$nomor.'.png');
        /* switch ($this->role_id) {
            case 1: 
                return asset('assets/backend/app-assets/images/portrait/small/avatar-s-26.png');
                break;
            case 2:
                return "https://sicyca.dinamika.ac.id/static/foto/".$this->email.".jpg";
            default:
                return asset('assets/backend/app-assets/images/portrait/small/avatar-s-26.png');
                break;
        } */
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function user_role()
    {
        // baca tabel user_roles
        return $this->hasOne(UserRole::class, 'user_id');
        // return $this->belongsTo(UserRole::class, 'id', 'user_id');
    }

    public function role_user()
    {
        // baca tabel roles
        return $this->belongsTo(Role::class, 'role_id');
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
