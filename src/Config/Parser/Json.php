<?php

namespace OpenHa\Configurator\Config\Parser;

use OpenHa\Configurator\Config\ParserInterface;

class Json implements ParserInterface
{
    /**
     * @psalm-suppress MixedReturnStatement
     * @throws \Exception
     */
    public function parse(string $serializedConfig): array
    {
        $parsedJson = json_decode($serializedConfig, true, 512, JSON_THROW_ON_ERROR);

        if (!is_array($parsedJson)) {
            throw new \Exception('JSON must be either object or array');
        }

        return $parsedJson;
    }
}
