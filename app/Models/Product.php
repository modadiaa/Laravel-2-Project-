<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Product extends Model
{
    use HasFactory;
    use HasTranslations;



    protected $fillable = ['name','slug', 'description', 'image','status','category_id','keyword','optionn'];
    public $translatable = ['name' ,'description','keyword','optionn' ];
    protected $primaryKey = 'category_id';


    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

}
