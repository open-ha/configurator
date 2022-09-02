<?php

namespace OpenHa\Configurator\File;

class Writer implements WriterInterface
{
    public function write(string $path, string $content): void
    {
        file_put_contents($path, $content);
    }
}
