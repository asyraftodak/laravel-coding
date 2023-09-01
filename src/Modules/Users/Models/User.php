<?php

namespace Modules\Users\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\CustomAuthenticatable;
use Modules\OneTimePasswords\Models\OneTimePassword;
use Modules\Profiles\Models\Profile;
use Modules\Users\Builders\UserQueryBuilder;
use Spatie\Permission\Traits\HasRoles;

class User extends CustomAuthenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function newEloquentBuilder($query): UserQueryBuilder
    {
        return new UserQueryBuilder($query);
    }

    public static function newFactory()
    {
        return UserFactory::new();
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function oneTimePassword(): HasOne
    {
        return $this->hasOne(OneTimePassword::class);
    }
}
