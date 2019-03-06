<?php
declare(strict_types = 1);

namespace App\Services;

class BinaryService
{
    /**
     * @param $binary
     * @return string
     */
    public function decodeBinary(string $binary): string
    {
        $hexCharacters = [];
        $characters = explode(' ', $binary);

        foreach ($characters as $character) {
            $hexCharacters[] =
            $hexCharacter = pack(
                'H*',
                base_convert($character, 2, 16)
            );

            if (!ctype_alnum($hexCharacter)
                && !ctype_punct($hexCharacter)
                && !ctype_space($hexCharacter)) {
                throw new \InvalidArgumentException(
                    'Unable to perform binary to string conversion on character - ' . $character
                );
            }
        }

        return implode('', $hexCharacters);
    }

    /**
     * @param string $json
     * @return array
     */
    public function decodeJsonBinary(string $json): array
    {
        $jsonArray = json_decode($json, true);

        foreach ($jsonArray as $key => $value) {
            $value = $this->decodeBinary($value);
            $jsonArray[$key] = $value;
        }

        return $jsonArray;
    }
}
