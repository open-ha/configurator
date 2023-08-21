<?php

namespace OpenHa\Configurator\Platform\Core\Api\Model;

interface CustomizableInterface
{
    public function getData(string $key): mixed;
}
