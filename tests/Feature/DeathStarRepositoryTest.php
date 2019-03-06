<?php
declare(strict_types=1);

namespace Tests\Feature;

use App\Configuration\Configuration;
use App\Repository\DeathStarRepository;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Tests\TestCase;

class DeathStarRepositoryTest extends TestCase
{
    /**
     * @var DeathStarRepository
     */
    private $deathStarRepository;

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
        $this->deathStarRepository = new DeathStarRepository($apiClient, new Configuration());

        $this->mockHandler->append(
            new Response(
                200,
                [],
                json_encode([
                    'access_token' => 'e31a726c4b90462ccb7619e1b51f3d0068bf8006'
                ])
            ));
    }

    /**
     * Test GET /prisoner/leia success
     */
    public function testGetPrisonSuccess()
    {
        $this->mockHandler->append(
            new Response(
                200,
                [],
                json_encode([
                    'cell' => '01000011 01100101 01101100 01101100 00100000 00110010 00110001 00111000 00110111',
                    'block' => '01000100 01100101 01110100 01100101 01101110 01110100 01101001 01101111 01101110
00100000 01000010 01101100 01101111 01100011 01101011 00100000 01000001 01000001 00101101 00110010
00110011 00101100'
                ])
            ));

        $response = $this->deathStarRepository->getPrisoner('leia');
        $this->assertEquals(
            200,
            $response->getStatusCode()
        );
    }

    /**
     * Test DELETE /reactor/exhaust/1 success
     */
    public function testDeleteReactorExhaust()
    {
        $this->mockHandler->append(
            new Response(
                200,
                []
            ));

        $response = $this->deathStarRepository->deleteReactorExhaust(1);
        $this->assertEquals(
            200,
            $response->getStatusCode()
        );
    }
}
