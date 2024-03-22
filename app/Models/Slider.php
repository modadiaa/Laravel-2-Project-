<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Slider extends Model
{
    use HasTranslations;

    protected $fillable = ['small_title', 'big_title', 'image'];
    public $translatable = ['small_title', 'big_title' ];
}
