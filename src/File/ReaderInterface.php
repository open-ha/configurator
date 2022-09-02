<?php

namespace OpenHa\Configurator\File;

interface ReaderInterface
{
    public function read(string $path): string;
}
