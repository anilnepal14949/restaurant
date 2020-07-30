<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name'];

    public function foods() {
        return $this->hasMany('App\Food', 'category_id', 'id');
    }
}
