<?php
declare(strict_types = 1);

namespace App\Repository;

use GuzzleHttp\Psr7\Response;

class DeathStarRepository extends OauthRepository
{
    /**
     * @param string $endpoint
     * @return string
     */
    private function generateUri(string $endpoint): string
    {
        return getenv('DEATHSTAR_API_URL') . $endpoint;
    }

    /**
     * @param string $prisoner
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPrisoner(string $prisoner): Response
    {
        $uri = $this->generateUri('/prisoner/' . $prisoner);
        $response = $this->makeAuthenticatedRequest(
            'GET',
            $uri
        );

        return $response;
    }

    /**
     * @param int $id
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteReactorExhaust(int $id): Response
    {
        $uri = $this->generateUri('/reactor/exhaust/' . $id);
        $response = $this->makeAuthenticatedRequest(
            'DELETE',
            $uri
        );

        return $response;
    }
}
