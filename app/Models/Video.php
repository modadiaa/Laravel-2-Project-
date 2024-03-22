<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Video extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name', 'slug', 'image','link','keyword','optionn'];
    public $translatable = ['name','keyword','optionn'];

}
