<?php

use Faker\Generator as Faker;
use App\Concert;
use Illuminate\Support\Carbon;

$factory->define(Concert::class, function (Faker $faker) {
    return [
        'title'                 => $faker->name,
        'subtitle'              => $faker->name,
        'date'                  => $faker->dateTimeBetween('+0 days', '+2 years'),
        'ticket_price'          => $faker->randomNumber(),
        'venue'                 => $faker->secondaryAddress,
        'venue_address'         => $faker->streetAddress,
        'city'                  => $faker->city,
        'state'                 => $faker->state,
        'zip'                   => $faker->postcode,
        'additional_information' => $faker->text
    ];
});

$factory->state(Concert::class, 'published', function (Faker $faker) {
    return [
        'published_at' => Carbon::parse("-1 week")
    ];
});

$factory->state(Concert::class, 'unpublished', function (Faker $faker) {
    return [
        'published_at' => null
    ];
});
