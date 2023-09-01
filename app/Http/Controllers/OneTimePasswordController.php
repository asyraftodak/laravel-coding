<?php

namespace App\Http\Controllers;

use Modules\OneTimePasswords\Interfaces\OneTimePasswordServiceInterface;

class OneTimePasswordController extends Controller
{
    public function __construct(
        protected OneTimePasswordServiceInterface $service
    ) {
    }
}
