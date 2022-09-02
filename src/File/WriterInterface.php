<?php

namespace OpenHa\Configurator\File;

interface WriterInterface
{
    public function write(string $path, string $content): void;
}
