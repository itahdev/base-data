<?php

namespace Tests\Helpers;

use App\Models\DParkUser;
use PHPOpenSourceSaver\JWTAuth\JWTGuard;

trait UserTokenService
{
    /**
     * @param DParkUser|null $user
     * @return string
     */
    protected function generateToken(?DParkUser $user = null): string
    {
        if (!$user) {
            $user = DParkUser::factory()->create();
        }

        /** @var JWTGuard $guard */
        $guard = auth('user');

        return $guard->fromUser($user);
    }

    /**
     * @param DParkUser|null $user
     * @return string[]
     */
    protected function headersWithToken(?DParkUser $user = null): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->generateToken($user)
        ];
    }
}
