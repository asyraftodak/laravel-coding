<?php

namespace Modules\Auth\Enums;

enum LoginMode: string
{
    case EMAIL = 'email';
    case MOBILE_NO = 'mobile_no';
}
