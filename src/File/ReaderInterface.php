<?php

namespace OpenHa\Configurator\File;

interface ReaderInterface
{
    /**
     * @throws \OpenHa\Configurator\Exception\FileReadException
     */
    public function read(string $path): string;
}
