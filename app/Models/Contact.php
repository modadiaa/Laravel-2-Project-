<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Contact extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name', 'email', 'workk', 'address','phone','mobile','fax','facebook','twitter','Youtube','Youtube','Instagram','Google','telegram','keyword','optionn'];
    public $translatable = ['name', 'workk','address','keyword','optionn' ];
}
