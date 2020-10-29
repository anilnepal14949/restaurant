<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function format() {
        return [
            'id'=>$this->id,
            'name' => $this->supplier_name,
            'customer' => $this->customer->name
        ];
    }
}
