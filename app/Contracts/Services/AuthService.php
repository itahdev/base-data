<?php

namespace App\Contracts\Services;

use App\Data\Auth\AuthUser;
use App\Data\Auth\LoginData;

interface AuthService
{
    /**
     * @param LoginData $data
     * @return AuthUser
     */
    public function login(LoginData $data): AuthUser;
}
