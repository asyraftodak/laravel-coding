<?php

namespace App\Observers;

use Illuminate\Support\Str;
use Modules\Users\Models\User;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     */
    public function creating(User $user): void
    {
        $user->uuid = (string) Str::uuid();
    }
}
