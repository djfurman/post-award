<?php

use Faker\Generator as Faker;
use App\Security\AccessRequest;

$factory->define(AccessRequest::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement(['initial', 'modification', 'deletion']),
        'system' => 'FACET Post-Award',
        'request_at' => $faker->dateTimeThisMonth(),
    ];
});
