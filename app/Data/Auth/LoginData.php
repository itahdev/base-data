<?php

namespace App\Data\Auth;

use Spatie\LaravelData\Attributes\Validation\ArrayType;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class LoginData extends Data
{
    /**
     * @param string $email
     * @param string $password
     */
    public function __construct(
        #[Required, StringType, Email, Max(255)]
        public string $email,
        #[Required, StringType, Min(6), Max(255)]
        public string $password
    ) {
    }
}
