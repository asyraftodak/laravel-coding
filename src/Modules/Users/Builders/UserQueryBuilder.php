<?php

namespace Modules\Users\Builders;

use Illuminate\Database\Eloquent\Builder;
use Modules\Auth\Enums\LoginMode;

class UserQueryBuilder extends Builder
{
    public function getUserByUuid(string $uuid): self
    {
        return $this->where('uuid', $uuid);
    }

    public function getUserAtLogin(string $value, LoginMode $mode): self
    {
        return $this->where($mode->value, $value);
    }
}
