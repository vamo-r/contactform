<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Contact::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'fullname' => $this->faker->name,
      'gender' => $this->faker->numberBetween(1,3),
      'email' => $this->faker->safeEmail,
      'postcode' => $this->faker->randomNumber(8),
      'address' => $this->faker->state,
      'building_name' => $this->faker->city,
      'opinion' => $this->faker->sentence(),
    ];
  }
}
