<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//use Spatie\Translatable\HasTranslations;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
   // use HasTranslations;
    protected $fillable = ['name', 'email', 'password','phone_number','address'];
   // public $translatable = ['name', 'address' ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
