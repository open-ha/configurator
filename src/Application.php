<?php

namespace OpenHa\Configurator;

class Application extends \Symfony\Component\Console\Application
{
    public function __construct(
        string $name = 'OpenHA Configurator',
        string $version = '0.1.0'
    ) {
        parent::__construct($name, $version);
    }
}
