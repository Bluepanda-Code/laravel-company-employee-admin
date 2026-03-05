<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company . ' ' . Str::random(3),
            'email' => $this->faker->unique()->companyEmail,
            'website' => $this->faker->url,
            'logo' => null, // we'll handle upload separately
        ];
    }
}