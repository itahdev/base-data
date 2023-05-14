<?php

namespace Tests\Helpers;

use Illuminate\Testing\TestResponse;
use Osteel\OpenApi\Testing\Exceptions\ValidationException;
use Osteel\OpenApi\Testing\ValidatorBuilder;

trait TestSwaggerService
{
    /**
     * @param TestResponse $response
     * @param string $path
     * @param string $method
     * @return bool
     * @throws ValidationException
     */
    private function validateSwagger(TestResponse $response, string $path, string $method): bool
    {
        $validator = ValidatorBuilder::fromJson('storage/api-docs/api-docs.json')->getValidator();

        return $validator->validate($response->baseResponse, $path, $method);
    }

    /**
     * @param TestResponse $response
     * @param string $path
     * @return bool
     * @throws ValidationException
     */
    protected function postSwagger(TestResponse $response, string $path): bool
    {
        return $this->validateSwagger($response, $path, 'post');
    }

    /**
     * @param TestResponse $response
     * @param string $path
     * @return bool
     * @throws ValidationException
     */
    protected function getSwagger(TestResponse $response, string $path): bool
    {
        return $this->validateSwagger($response, $path, 'get');
    }

    /**
     * @param TestResponse $response
     * @param string $path
     * @return bool
     * @throws ValidationException
     */
    protected function deleteSwagger(TestResponse $response, string $path): bool
    {
        return $this->validateSwagger($response, $path, 'delete');
    }
}
