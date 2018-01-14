<?php

use Faker\Generator as Faker;

$factory->define(App\Concert::class, function (Faker $faker) {
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
        'additional_information'=> $faker->text
    ];
});
