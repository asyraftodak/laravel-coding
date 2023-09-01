<?php

namespace Modules\OneTimePasswords\Exceptions;

use Modules\CustomException;

class OneTimePasswordException extends CustomException
{
    public static function invalidOtp(): self
    {
        return new self('Invalid One Time Password (OTP).', 422);
    }

    public static function otpHasExpired(): self
    {
        return new self('Your One Time Password(OTP) has expired, please try again.', 422);
    }

    public static function userNotFound(): self
    {
        return new self('User not found', 422);
    }

    public static function otpNotGenerated(): self
    {
        return new self('OTP not generated', 422);
    }

    public static function otpNotSent(): self
    {
        return new self('OTP not sent', 422);
    }
}
