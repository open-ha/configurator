<?php

namespace OpenHa\Configurator\Config;

interface AutocompleteInterface
{
    public function autocomplete(array $config): array;
}
