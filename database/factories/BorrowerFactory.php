<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Borrower;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Borrower::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid(),
        'step' => $faker->numberBetween(1, 5),
        'steps' => json_encode(array_map(function(){ return rand(0,99); }, array_fill(0, 5, null))),
        'login_id' => $faker->uuid(),
        'monthly_sales' => $faker->randomFloat(2, 0, 100000),
        'monthly_expenses' => $faker->randomFloat(2, 0, 100000),
        'other_financing' => $faker->boolean(),
        'other_financing_amount' => $faker->randomFloat(2, 0, 100000),
        'legal_business_name' => $faker->company(),
        'business_physical_address' => $faker->streetAddress(),
        'business_physical_city' => $faker->city(),
        'business_physical_province' => $faker->provinceAbbr(),
        'business_physical_postal' => $faker->postcode(),
        'email' => $faker->safeEmail(),
        'dob' => $faker->date(),
    ];
});
