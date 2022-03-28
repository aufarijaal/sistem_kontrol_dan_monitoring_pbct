<?php

namespace Database\Factories;

use App\Models\Stat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stat>
 */
class StatFactory extends Factory
{
    protected $model = Stat::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $timestamp = $this->faker->dateTimeBetween(now()->startOfDay(), now());
        return [
            'machineid' => 'sCNO_YnXOFAKID',
            'weighthalus' => 0,
            'weightkasar' => (rand(0,50) / 10),
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ];
    }
}
