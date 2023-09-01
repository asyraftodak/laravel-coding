<?php

namespace Modules\OneTimePasswords\Builders;

use Illuminate\Database\Eloquent\Builder;

class OneTimePasswordQueryBuilder extends Builder
{
    public function isExpired(): self
    {
        return $this->where('expires_at', '<=', now());
    }
}
