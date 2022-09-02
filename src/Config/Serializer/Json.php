<?php

namespace OpenHa\Configurator\Config\Serializer;

use OpenHa\Configurator\Config\SerializerInterface;

class Json implements SerializerInterface
{
    public function serialize(array $data): string
    {
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}
