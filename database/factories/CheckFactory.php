<?php

namespace Database\Factories;

use App\Models\Check;
use Illuminate\Database\Eloquent\Factories\Factory;

class CheckFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Check::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
		return [
			'image' => mb_substr($this->faker->image(storage_path('app/public'),150,100),52) ,
			'code' => $this->faker->randomElement([null,rand(11111111,99999999)]),
			'type' => $this->faker->randomElement(['обычный','призовой']),
			'status'=>rand(1,2),
			'user_id'=>rand(1,30),
			'created_at'=>$this->faker->randomElement(['2021-09-20 19:02:09','2021-09-21 19:02:09','2021-09-25 19:02:09','2021-09-25 19:02:09','2021-09-23 19:02:09','2021-09-11 19:02:09','2021-09-24 19:02:09'])
		];
    }
}
