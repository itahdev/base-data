<?php

namespace App\Http\Controllers\V1;

use App\Contracts\Services\AuthService;
use App\Data\Auth\LoginData;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\LoginRequest;
use App\Transformers\AuthResource;
use App\Transformers\Commons\ErrorResource;
use OpenApi\Attributes as OA;

class AuthController extends BaseController
{
    /**
     * @param AuthService $authService
     */
    public function __construct(
        readonly private AuthService $authService
    ) {
    }

    #[OA\Post(
        path: '/v1/auth/login',
        summary: 'User login',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(ref: LoginRequest::class)
        ),
        tags: ['AUTH'],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Successful',
                content: new OA\JsonContent(ref: AuthResource::class)
            ),
            new OA\Response(
                response: 403,
                description: 'Login failed',
                content: new OA\JsonContent(ref: ErrorResource::class)
            ),
            new OA\Response(
                response: 422,
                description: 'The email field is required',
                content: new OA\JsonContent(ref: ErrorResource::class)
            ),
            new OA\Response(
                response: 500,
                description: 'Server error',
                content: new OA\JsonContent(ref: ErrorResource::class)
            )
        ]
    )]
    public function login(LoginData $data): AuthResource
    {
        $auth = $this->authService->login($data);

        return AuthResource::make($auth);
    }
}
