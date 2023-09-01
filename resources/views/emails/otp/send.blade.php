<x-mail::message>
    Hi {{ $user->name }},

    Your OTP is {{ $otp->value }}. It will expires in 5 minutes.

    Thanks,
    {{ config('app.name') }}
</x-mail::message>
