<?php

namespace App\Data\Auth;

use Spatie\LaravelData\Data;

class AuthUser extends Data
{
    /**
     * @param string $token
     * @param int $expiresIn
     */
    public function __construct(
        public string $token,
        public int $expiresIn
    ) {
    }
}
