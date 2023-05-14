<?php

namespace App\Transformers\Commons;

use OpenApi\Attributes as OA;

#[OA\Schema(
    properties: [
        new OA\Property(property: 'data', type: 'array', items: new OA\Items(properties: [])),
        new OA\Property(property: 'meta', ref: '#/components/schemas/MetaResource'),
    ],
)]
class SuccessAllResource extends Resource
{
    /**
     * SuccessAllResource constructor.
     *
     * @param mixed|null $resource
     * @param string $message
     */
    public function __construct(mixed $resource = null, string $message = 'Successful operation')
    {
        parent::__construct($resource, new MetaResource($message));
    }
}
