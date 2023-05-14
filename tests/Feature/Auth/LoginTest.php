<?php

namespace Tests\Feature\Auth;

use App\Models\DPark;
use App\Models\DParkUser;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Osteel\OpenApi\Testing\Exceptions\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Tests\Helpers\TestSwaggerService;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseTransactions;
    use TestSwaggerService;

    private const PASSWORD = 'password';

    /**
     * @return void
     * @throws ValidationException
     */
    public function testOpenApi(): void
    {
        $user = $this->dataForTestSuccess();

        $response = $this->postJson(route('login'), [
            'email' => $user->email,
            'password' => self::PASSWORD,
        ]);

        $validate = $this->postSwagger($response, route('login', [], false));
        $this->assertTrue($validate);
    }

    /**
     * @return void
     */
    public function testSuccess(): void
    {
        $user = $this->dataForTestSuccess();

        $response = $this->postJson(route('login'), [
            'email' => $user->email,
            'password' => self::PASSWORD,
        ]);

        $response->assertOk();
    }

    /**
     * @return void
     */
    public function testLoginWithValidateError(): void
    {
        $response = $this->postJson(route('login'));

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @return void
     */
    public function testLoginWithAuthFailed(): void
    {
        $response = $this->postJson(route('login'), [
            'email' => fake()->unique()->safeEmail,
            'password' => self::PASSWORD,
        ]);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /**
     * @return DParkUser
     */
    private function dataForTestSuccess(): DParkUser
    {
        $park = DPark::factory()->create();

        return DParkUser::factory()->create([
            'park_id' => $park->id,
            'password' => bcrypt(self::PASSWORD),
        ]);
    }
}
