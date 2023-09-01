<?php

namespace Modules\OneTimePasswords\Services;

use App\Mail\SendOneTimePassword;
use Exception;
use Helpers\HOneTimePassword;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Modules\Auth\Enums\LoginMode;
use Modules\OneTimePasswords\Exceptions\OneTimePasswordException;
use Modules\OneTimePasswords\Interfaces\OneTimePasswordServiceInterface;
use Modules\OneTimePasswords\Models\OneTimePassword;
use Modules\Users\Models\User;

class OneTimePasswordService implements OneTimePasswordServiceInterface
{
    public function generateOneTimePassword(User $user): OneTimePassword
    {
        try {
            /** @var OneTimePassword */
            return OneTimePassword::updateOrCreate([
                'user_id' => $user->id,
            ], [
                'value' => HOneTimePassword::generateOneTimePassword(),
                'verified_at' => null,
                'expires_at' => now()->addMinutes(5),
            ]);
        } catch (\Exception) {
            throw OneTimePasswordException::otpNotGenerated();
        }
    }

    public function sendOneTimePassword(OneTimePassword $otp, LoginMode $mode, User $user): void
    {
        match ($mode->value) {
            'email' => $this->sendOneTimePasswordViaEmail($otp, $user),
            'mobile_no' => $this->sendOneTimePasswordViaSms($otp, $user)
        };
    }

    public function verifyOneTimePassword(string $otp, User $user): User
    {
        if (now() >= $user->oneTimePassword->expires_at) {
            throw OneTimePasswordException::otpHasExpired();
        }

        if ($otp !== $user->oneTimePassword->value) {
            throw OneTimePasswordException::invalidOtp();
        }

        $user->oneTimePassword->update([
            'value' => null,
            'verified_at' => now(),
            'expires_at' => null,
        ]);

        return $user;
    }

    protected function sendOneTimePasswordViaEmail(OneTimePassword $otp, User $user): void
    {
        Mail::to($user->email)->queue(new SendOneTimePassword($otp, $user));
    }

    protected function sendOneTimePasswordViaSms(OneTimePassword $otp, User $user): void
    {
        try {
            $request = Http::withHeaders([
                'Content-Type' => 'json',
            ])->withBody(json_encode([
                'to' => $user->mobile_no,
                'message' => "Your OTP code is $otp->value. Don't share it with anyone",
                'projectName' => config('app.name'),
                'preview' => false,
            ]), 'application/json')->post(env('SMS_URL'));

            if ($request->status() !== 200) {
                $body = json_decode($request->body(), true);
                throw new Exception($body['message']);
            }
        } catch (Exception $e) {
            Log::debug($e->getMessage());
        }
    }
}
