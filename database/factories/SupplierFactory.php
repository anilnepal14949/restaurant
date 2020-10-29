<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'customer_id'=>factory(App\Customer::class),
        'supplier_name'=>$faker->word
    ];
});
