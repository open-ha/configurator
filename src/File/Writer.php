<?php

namespace OpenHa\Configurator\File;

use OpenHa\Configurator\Exception\FileWriteException;

class Writer implements WriterInterface
{
    public function write(string $path, string $content): void
    {
        if (file_exists($path) && !is_writable($path)) {
            throw new FileWriteException(sprintf('Path \'%s\' is unwritable', $path));
        }

        if (is_dir($path)) {
            throw new FileWriteException(sprintf('Path \'%s\ is a directory', $path));
        }

        file_put_contents($path, $content);
    }
}
