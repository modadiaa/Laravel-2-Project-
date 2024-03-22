<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Setting extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['title', 'email', 'tagline'];
    public $translatable = ['title'];

}
