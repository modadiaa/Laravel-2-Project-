<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;
    protected $fillable = ['name', 'slug','description', 'image', 'parent','keyword','optionn'];
    public $translatable = ['name','description','keyword','optionn' ];

    public function _parent(){
        return $this->belongsTo(self::class,'parent');
    }

    /*public function child(){
        return $this->hasMany('App\Models\Category','id');
    }*/

    public function products(){
        return $this->hasMany('App\Models\Product','category_id');
    }

}
