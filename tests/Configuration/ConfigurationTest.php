<?php
declare(strict_types = 1);

namespace Tests\Feature;

use App\Configuration\Configuration;
use Symfony\Component\Dotenv\Exception\PathException;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    /**
     * Test Configuration
     */
    public function testInitial()
    {
        $conf = new Configuration();
        $conf->initial();
        $this->assertIsString(getenv('DEATHSTAR_API_URL'));
    }

    /**
     * Test Configuration if fails
     */
    public function testInitialFail()
    {
        $this->expectException(PathException::class);
        $conf = new Configuration(null);
        $conf->initial();
    }
}
