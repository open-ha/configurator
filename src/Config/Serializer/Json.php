<?php

namespace OpenHa\Configurator\Config\Serializer;

use OpenHa\Configurator\Config\SerializerInterface;

class Json implements SerializerInterface
{
    public function serialize(array $config): string
    {
        return json_encode($config, JSON_UNESCAPED_UNICODE);
    }
}
