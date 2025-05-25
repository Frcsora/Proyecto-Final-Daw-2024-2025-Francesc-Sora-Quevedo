<?php

namespace Database\Factories;

use App\Models\Tournaments;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentsFactory extends Factory
{
    protected $model = Tournaments::class;

    public function definition()
    {
        return [
            'name' => 'Spring Cup',
            'event' => 'Spring Event',
            'date' => now()->toDateString(),
            'time' => now()->toTimeString(),
            'result' => null,
        ];
    }
}
