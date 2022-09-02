<?php

namespace OpenHa\Configurator\Config;

interface SerializerInterface
{
    public function serialize(array $data): string;
}
