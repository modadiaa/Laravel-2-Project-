<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class News extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name','title','slug', 'description','keyword','optionn'];
    public $translatable = ['name' ,'title','description','keyword','optionn' ];

}
