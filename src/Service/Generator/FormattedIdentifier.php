<?php

namespace OpenHa\Configurator\Service\Generator;

use OpenHa\Configurator\Service\GeneratorInterface;

class FormattedIdentifier implements GeneratorInterface
{
    public function __construct(
        private int $counter,
        private readonly string $format,
        private readonly array $excluded = []
    ) {
    }

    public function next(): string
    {
        do {
            $id = sprintf($this->format, $this->counter++);
        } while (in_array($id, $this->excluded));

        return $id;
    }
}
