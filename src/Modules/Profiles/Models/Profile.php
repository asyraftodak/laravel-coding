<?php

namespace Modules\Profiles\Models;

use App\Models\User;
use Database\Factories\ProfileFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\CustomModel;
use Modules\Profiles\Builders\ProfileQueryBuilder;

class Profile extends CustomModel
{
    use HasFactory;

    protected $guarded = [];

    public function newEloquentBuilder($query): ProfileQueryBuilder
    {
        return new ProfileQueryBuilder($query);
    }

    public static function newFactory(): ProfileFactory
    {
        return ProfileFactory::new();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
