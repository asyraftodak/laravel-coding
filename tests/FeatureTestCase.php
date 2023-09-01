<?php

namespace Tests;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\Auth\Enums\RoleType;
use Modules\Teams\Models\Team;
use Modules\Users\Models\User;

abstract class FeatureTestCase extends BaseTestCase
{
    use CreatesApplication;
    use LazilyRefreshDatabase;

    protected User $currentUser;

    protected Team $currentTeam;

    protected function signIn(User $user = null, bool $api = false): self
    {
        if (! $user) {
            $team = Team::factory()->create();
            $user = User::factory()->for($team)->create();
        }

        $this->currentUser = $user;
        $this->currentTeam = $team ?? $user->team;

        return $this->actingAs($user, $api ? 'api' : 'web');
    }

    protected function asRole(RoleType $role, User $user = null, bool $api = false): self
    {
        $this->signIn($user, $api);
        $this->currentUser->assignRole($role->value);

        return $this;
    }

    protected function asAdmin(User $user = null, bool $api = false): self
    {
        return $this->asRole(RoleType::Admin, $user, $api);
    }

    protected function asStaff(User $user = null, bool $api = false): self
    {
        return $this->asRole(RoleType::Staff, $user, $api);
    }

    protected function withPermission(string $permission): self
    {
        $this->getUser()->givePermissionTo($permission);

        return $this;
    }

    public function getUser(): User
    {
        return $this->currentUser;
    }

    public function getCurrentTeam(): Team
    {
        return $this->currentTeam;
    }
}
