<?php
declare(strict_types = 1);

namespace Tests\Unit;

use App\Services\BinaryService;
use Tests\TestCase;

class BinaryServiceTest extends TestCase
{
    /**
     * @var BinaryService
     */
    private $binaryService;

    public function setUp()
    {
        parent::setUp();
        $this->binaryService = new BinaryService();
    }

    public function testDecodeBinarySuccess()
    {
        $binary = '01000011 01100101 01101100 01101100 00100000 00110010 00110001 00111000 00110111';
        $result = $this->binaryService->decodeBinary($binary);

        $this->assertSame(
            'Cell 2187',
            $result
        );
    }

    public function testDecodeBinaryFailure()
    {
        $this->expectException(\InvalidArgumentException::class);
        $binary = '01000011 01100101 asdasdasd';
        $this->binaryService->decodeBinary($binary);
    }

    public function testDecodeJsonBinarySuccess()
    {
        $data = [
            'cell' => '01000011 01100101 01101100 01101100 00100000 00110010 00110001 00111000 00110111',
            'block' => '01000100 01100101 01110100 01100101 01101110 01110100 01101001 01101111 01101110 00100000 01000010 01101100 01101111 01100011 01101011 00100000 01000001 01000001 00101101 00110010 00110011 00101100'
        ];

        $jsonData = json_encode($data);
        $result = $this->binaryService->decodeJsonBinary($jsonData);

        $expectedResult = [
            'cell' => 'Cell 2187',
            'block' => 'Detention Block AA-23,'
        ];

        $this->assertSame(
            $expectedResult,
            $result
        );
    }
}
