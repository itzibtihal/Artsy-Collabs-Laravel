<?php

namespace App\Models;
use App\Models\Role;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'profile',
        'full_name',
        'profession',
        'phone_number',
        'email',
        'password',
        'status',
    ];

    const STATUS_RADIO = [
        0 => 'Pending',
        1 => 'Approved',
        2 => 'Banned',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    
    public function roles()
{
    return $this->belongsToMany(Role::class);
}

}

