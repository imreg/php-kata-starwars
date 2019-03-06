<?php
declare(strict_types = 1);

namespace App\Configuration;

use Symfony\Component\Dotenv\Dotenv;

class Configuration
{
    /**
     * @var string
     */
    private $file;

    /**
     * Configuration constructor.
     * @param string $file
     */
    public function __construct($file = '.env.example')
    {
        $this->file = $file;
    }

    public function initial()
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/../../' . $this->file);
    }
}
