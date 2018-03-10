<?php

use Faker\Generator as Faker;
use App\Security\AccessRequest;
use Illuminate\Support\Carbon;

$factory->define(AccessRequest::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement(['initial', 'modification', 'deletion']),
        'system' => 'FACET Post-Award',
        'system_location' => 'The Cloud',
        'request_at' => $faker->iso8601(),
    ];
});
