<?php

namespace App\Services;

use App\Contracts\Services\AuthService;
use App\Data\Auth\AuthUser;
use App\Data\Auth\LoginData;
use App\Exceptions\ApiException;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\JWTAuth;

class AuthServiceImpl implements AuthService
{
    /**
     * @param LoginData $data
     * @return AuthUser
     */
    public function login(LoginData $data): AuthUser
    {
        /** @var JWTAuth $auth */
        $auth = Auth::guard();
        $credentials = $data->only('email', 'password')->toArray();
        $token = $auth->attempt($credentials);
        if (!$token) {
            throw ApiException::forbidden(trans('auth.failed'));
        }

        $expiresIn = $auth->factory()->getTTL() * 60;

        return new AuthUser($token, $expiresIn);
    }
}
