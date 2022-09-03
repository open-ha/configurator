<?php

namespace OpenHa\Configurator\File;

interface WriterInterface
{
    /**
     * @throws \OpenHa\Configurator\Exception\FileWriteException
     */
    public function write(string $path, string $content): void;
}
