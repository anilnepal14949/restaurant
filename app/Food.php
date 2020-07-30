<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['food_name','food_desc','food_price','category_id','food_image'];

    public function category() {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}
