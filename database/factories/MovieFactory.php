<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title,
            'image' => $this->faker->image('public/img/catalogs', 300, 500, null, false),
            // 'cover' => $this->faker->image('public/img/catalogs', 300, 500, null, true),
            'genre_id' => $this->faker->numberBetween(1, 2),
            'premiere' => $this->faker->numberBetween(0, 300),
            'quality' => $this->faker->buildingNumber,
            'video_link' => $this->faker->text(55),
            'keyword' => $this->faker->word(),
            'writer_id' => $this->faker->numberBetween(1, 2),
            'director_id' => $this->faker->numberBetween(1, 2),
            'year' => $this->faker->numberBetween(2000, 2021),
            'desc' => $this->faker->text(55),
            'star' => $this->faker->numberBetween(1, 10),
            'age_limit' => $this->faker->numberBetween(13, 18),
            'country' => $this->faker->text(5),
        ];
    }
}
