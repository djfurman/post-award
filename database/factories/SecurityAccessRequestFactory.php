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
        'ldap' => $faker->regexify('[a-z]{2}[0-9]{4}'),
        'mfa' => $faker->uuid,
        'given_name' => $faker->firstName(),
        'surname' => $faker->lastName(),
        'middle_initial' => $faker->randomLetter(),
        'street_line_1' => $faker->streetAddress(),
        'street_line_2' => null,
        'city' => $faker->city(),
        'state' => $faker->stateAbbr(),
        'country' => $faker->country(),
        'planet' => 'Earth',
    ];
});
