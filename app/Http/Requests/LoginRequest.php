<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\Auth\Enums\LoginMode;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required_if:mode,'.LoginMode::EMAIL->value,
                'email',
                'exists:users,email',
            ],
            'mode' => [
                'required',
                'string',
                new Enum(LoginMode::class),
            ],
            'mobile_no' => [
                'required_if:mode,'.LoginMode::MOBILE_NO->value,
                'string',
                'regex:/^60/',
                'exists:users,mobile_no',
            ],
        ];
    }
}
