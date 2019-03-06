<?php
declare(strict_types = 1);

namespace App\Repository;

use App\Configuration\Configuration;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class OauthRepository
{
    /**
     * @var string
     */
    protected $oauthToken;

    /**
     * @var Client
     */
    private $httpClient;

    /**
     * OauthRepository constructor.
     * @param Client $httpClient
     * @param Configuration $conf
     */
    public function __construct(Client $httpClient, Configuration $conf)
    {
        $this->httpClient = $httpClient;
        $conf->initial();
    }

    /**
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getOauthToken(): string
    {
        $response = $this->httpClient->request(
            'POST',
            getenv('DEATHSTAR_API_URL') . '/token',
            [
                'headers' => [
                    'content-type' => 'application/x-www-form-urlencoded'
                ],
                'data ' => [
                    'client_id' => getenv('DEATHSTAR_API_CLIENT_IDL'),
                    'client_secret' => getenv('DEATHSTAR_API_CLIENT_SECRET'),
                    'grant_type' => 'client_credentials',
                ]
            ]
        );

        $responseBody = json_decode($response->getBody()->getContents(), true);
        $this->oauthToken = $responseBody['access_token'];

        return $this->oauthToken;
    }

    /**
     * @param string $requestType
     * @param string $uri
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function makeAuthenticatedRequest(string $requestType, string $uri): Response
    {
        if (!$this->oauthToken) {
            $this->getOauthToken();
        }

        return $this->httpClient->request(
            $requestType,
            $uri,
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->oauthToken,
                    'Content-Type' => 'application/json'
                ]
            ]
        );
    }
}
