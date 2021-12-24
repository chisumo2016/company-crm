<?php

namespace Database\Factories;

use Domains\Contacts\Enums\Pronouns;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ContactFactory extends Factory
{
    /**
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title'             => $this->faker->title(),
            'first_name'        => $this->faker->firstName(),
            'middle_name'       => $this->faker->firstName(),
            'last_name'         => $this->faker->lastName(),
            'preferred_name'    => $this->faker->UserName(),
            'email'             => $this->faker->unique->safeEmail(),
            'phone'             => $this->faker->phoneNumber(),
            'pronouns'          => Arr::random(array: Pronouns::all()),
        ];
    }
}
