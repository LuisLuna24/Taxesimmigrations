<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'       => $this->faker->name(),
            'email'      => $this->faker->unique()->safeEmail(),
            'comment'    => $this->faker->sentence(10),
            'status'     => $this->faker->numberBetween(0, 2),
            'ip_address' => $this->faker->ipv4(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Estatus 0: Sin validar
     */
    public function sinValidar(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => 0,
        ]);
    }

    /**
     * Estatus 1: Validado
     */
    public function validado(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => 1,
        ]);
    }

    /**
     * Estatus 2: No validado
     */
    public function noValidado(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => 2,
        ]);
    }
}
