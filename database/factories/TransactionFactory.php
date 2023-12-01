<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => $this->faker->numberBetween(1, 10),
            'transaction_date' => $this->faker->date(),
            'transaction_time' => $this->faker->time(),
            'transaction_teller_name' => $this->faker->name(),
            'transaction_amount' => $this->faker->randomFloat(2, 10, 1000),
            'transaction_type' => $this->faker->randomElement(['Credit', 'Debit']),
        ];
    }
}
