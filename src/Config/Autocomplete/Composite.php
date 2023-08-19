<?php

namespace OpenHa\Configurator\Config\Autocomplete;

use OpenHa\Configurator\Config\AutocompleteInterface;

class Composite implements AutocompleteInterface
{
    /** @var AutocompleteInterface[] */
    private array $processors = [];

    /**
     * @param AutocompleteInterface[] $processors
     */
    public function __construct(array $processors = [])
    {
        $this->processors = $processors;
    }

    public function autocomplete(array $config): array
    {
        return array_reduce(
            $this->processors,
            fn(array $cfg, $proc) => $proc instanceof AutocompleteInterface ? $proc->autocomplete($cfg) : $cfg,
            $config
        );
    }
}
