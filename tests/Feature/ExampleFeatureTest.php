<?php

namespace Tests\Feature;

use Modules\Auth\Enums\RoleType;
use Tests\FeatureTestCase;

class ExampleFeatureTest extends FeatureTestCase
{
    /**
     * Throw 200 if valid role to create user
     *
     * @test
     *
     * @dataProvider validRolesToCreateUserProvider
     *  */
    public function user_can_be_created_by_valid_roles(RoleType $role): void
    {
        $this->asRole($role);

        $response = $this->postJson('/users', [
            'name' => '::name::',
            'email' => '::name::@test.com',
        ]);

        $response->assertSuccessful();
    }

    /**
     * Throw 403 if invalid role to create user
     *
     * @test
     *
     * @dataProvider invalidRolesToCreateUserProvider
     *  */
    public function user_cannot_be_created_by_invalid_roles(RoleType $role): void
    {
        $this->asRole($role);

        $response = $this->postJson('/users', [
            'name' => '::name::',
            'email' => '::name::@test.com',
        ]);

        $response->assertStatus(403);
    }

    public static function validRolesToCreateUserProvider(): array
    {
        return [
            [RoleType::Admin],
        ];
    }

    public static function invalidRolesToCreateUserProvider(): array
    {
        return [
            [RoleType::Staff],
        ];
    }
}
