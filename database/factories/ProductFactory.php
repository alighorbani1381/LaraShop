<?php
use App\Product;
use Faker\Generator as Faker;


$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category_id' => $faker->numberBetween($min=1,$max=5),
		'user_id' => $faker->numberBetween($min=1,$max=3),
        'brand' => $faker->name,
        'price' => $faker->numberBetween($min=1000,$max=90000),
        'discount' => $faker->numberBetween($min=0,$max=60),
        'special' => $faker->randomElement(['0', '1']),
        'bestseler' => $faker->numberBetween($min=0,$max=23),
        'body' => $faker->text($maxNbChars = 140),
        'image' => $faker->imageUrl($width = 400, $height = 400,'sports'),
        'total' => $faker->randomDigitNotNull,
        'category' => $faker->randomDigit,
    ];
});
