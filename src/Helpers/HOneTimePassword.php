<?php

namespace Helpers;

class HOneTimePassword
{
    public static function generateOneTimePassword(): int
    {
        return app()->isLocal() ? 123456 : bcrypt((string) random_int(100000, 999999));
    }
}
