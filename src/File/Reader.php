<?php

namespace OpenHa\Configurator\File;

use OpenHa\Configurator\Exception\FileReadException;

class Reader implements ReaderInterface
{
    public function read(string $path): string
    {
        if (!is_readable($path)) {
            throw new FileReadException(sprintf('Path \'%s\' does not exist or is unreadable', $path));
        }

        if (is_dir($path)) {
            throw new FileReadException(sprintf('Path \'%s\' is a directory', $path));
        }

        return file_get_contents($path);
    }
}
