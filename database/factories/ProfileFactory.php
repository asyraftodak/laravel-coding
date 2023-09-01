<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Departments\Models\Department;
use Modules\Profiles\Models\Profile;
use Modules\Users\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id,
            'full_name' => $this->faker->name,
            'mobile_no' => $this->faker->phoneNumber,
            'department_id' => Department::factory()->create()->id,
            'position' => $this->faker->jobTitle(),
        ];
    }
}
