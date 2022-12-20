<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

class LoginController extends Controller
{
    public function redirectToGoogle(AuthenticatedSessionController $authenticated)
    {
        return $authenticated->redirectToGoogle();
    }

    public function handleGoogleCallback(AuthenticatedSessionController $authenticated)
    {
        return $authenticated->handleGoogleCallback();
    }

    public function _registerOrLogin(AuthenticatedSessionController $authenticated)
    {
        return $authenticated->_registerOrLogin();
    }
}
