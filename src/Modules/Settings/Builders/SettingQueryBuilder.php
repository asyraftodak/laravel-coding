<?php

namespace Modules\Settings\Builders;

use Illuminate\Database\Eloquent\Builder;
use Modules\Users\Models\User;

class SettingQueryBuilder extends Builder
{
    public function forUser(User $user): self
    {
        return $this->where('user_id', $user->id);
    }
}
