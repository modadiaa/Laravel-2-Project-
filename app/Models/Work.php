<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Work extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name','slug', 'description', 'image','images','keyword','optionn'];
    public $translatable = ['name' ,'description','keyword','optionn' ];

}
