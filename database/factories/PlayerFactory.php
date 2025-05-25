<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nickname' => $this->faker->name(),
            'image' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIgAAACICAYAAAA8uqNSAAACDklEQVR4Ae3SA7KcQRTH0R6tKl5EvImZ2LZtG3tMv1t8wXfDjrrOr+pfRuMUSZIkSZIkSZIkSZIkfZy2btlQ7a/tfWwGiA3tXWxaBgLE3sQmZSBA7FWGAxB7keEAxJ5lOACxRxkOQOxhbFwGAsTux0ZlIEDsboYDELud4QDEbmY4ALGrLXGsXLluDkg/u9wYxyJWAeljF0vDAsa2WAWkj51vjGN7rALSx842xrEjVgHpY6cb49gZq4D0sRONceyKVUD62NHGOHYnOPoEUvQjOPYkMADJgwMQOPYlIADJgwMQOA4kEADJgwMQOA79OA5A4ABEP44CEEAAESCAAAIIIIAAAggggAACCCCAAAIIIIAIkHx/9oHbDxBAAAEEEEAAAQQQQAABBBBAAAEEEEAAAQQQQAABBBBA/liAAAIIIIAAAggggAACCCCAAAIIIIAAAggggAACCCCAAAIIIIAAAgggnQUIIIAAAggggAACCCCAAAIIIAIk2bEiQJKdKAIk2akiQJKdLUoC5EJREiCXipIAuVyUBMjV2KgMJEBuwJEFyC04sgC5A0cWIA/gyALkYUscceF57EOs2v8P5FFsDMfQAHkcmzTGUfsYIM/hyAbISziyAfIajmyAvIMjGyDvY1M4sgEygwOQFsEBCByAtMex6PeDAIEDEDgAgQMQOACRJEmSJEmSJEmSJEmSlgC3hREKDch8awAAAABJRU5ErkJggg=='
        ];
    }
}
