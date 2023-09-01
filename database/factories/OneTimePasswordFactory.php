<?php

namespace Database\Factories;

use Helpers\HOneTimePassword;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\OneTimePasswords\Models\OneTimePassword;
use Modules\Users\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\OneTimePasswords\Models>
 */
class OneTimePasswordFactory extends Factory
{
    protected $model = OneTimePassword::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id,
            'otp' => HOneTimePassword::generateOneTimePassword(),
            'otp_verified_at' => null,
            'otp_expires_at' => now()->addMinutes(5),
        ];
    }
}
