<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class About extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name', 'description','title' ,'image', 'slug','keyword','optionn'];
    public $translatable = ['name', 'description','title' ,'keyword','optionn'];
}
