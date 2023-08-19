<?php

namespace OpenHa\Configurator\Platform\Core\Config\Autocomplete;

use OpenHa\Configurator\Config\Autocomplete\Composite;
use OpenHa\Configurator\Service\GeneratorFactory;

class Home extends Composite
{
    public const DEFAULT_ID = 'home';

    public function __construct()
    {
        parent::__construct([
            new Home\Spaces(),
            new Home\Locations(),
        ]);
    }

    public function autocomplete(array $config): array
    {
        return ['id' => $config['id'] ?? static::DEFAULT_ID, ...parent::autocomplete($config)];
    }
}
