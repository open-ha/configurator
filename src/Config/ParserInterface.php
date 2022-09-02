<?php

namespace OpenHa\Configurator\Config;

interface ParserInterface
{
    public function parse(string $content): array;
}
