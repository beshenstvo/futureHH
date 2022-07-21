<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NotebookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'company' => $this->faker->word(),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'bth' => $this->faker->date()
        ];
    }
}
