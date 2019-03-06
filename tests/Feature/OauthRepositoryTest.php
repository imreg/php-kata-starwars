<?php
declare(strict_types = 1);

namespace Tests\Feature;

use App\Configuration\Configuration;
use App\Repository\OauthRepository;
use App\Repository\DeathStarRepository;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Tests\TestCase;

class OauthRepositoryTest extends TestCase
{
    /**
     * @var DeathStarRepository
     */
    private $stub;

    /**
     * @var MockHandler
     */
    private $mockHandler;

    public function setUp()
    {
        parent::setUp();
        $this->mockHandler = new MockHandler();
        $apiClient = new Client([
            'handler' => $this->mockHandler,
        ]);

        $this->stub = new OauthRepository($apiClient, new Configuration());
    }

    public function testGetOauthToken()
    {
        $expectedResponse = [
            'access_token' => 'e31a726c4b90462ccb7619e1b51f3d0068bf8006',
            'expires_in' => 99999999999,
            'token_type' => 'Bearer',
            'scope' => 'TheForce'
        ];

        $this->mockHandler->append(
            new Response(
                200,
                [],
                json_encode($expectedResponse)
            ));

        $response = $this->stub->getOauthToken();

        $this->assertSame(
            'e31a726c4b90462ccb7619e1b51f3d0068bf8006',
            $response
        );
    }
}
