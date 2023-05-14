<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use OpenApi\Attributes as OA;

#[OA\Info(
    version: '1.0.0',
    description: 'API Documentation for Staff app service',
    title: 'API Documentation'
)]

#[OA\Server(
    url: '/api',
    description: 'API Staff App Server'
)]
abstract class BaseController extends Controller
{

}
