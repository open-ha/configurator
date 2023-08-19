<?php

namespace OpenHa\Configurator\Test\Unit\DataProvider;

class Generator
{
    public static function formattedIdentifier(): array
    {
        return [
            'numbers' => [1, '%d', ['1', '2', '3', '4', '5']],
            'characters' => [97, '%c', ['a', 'b', 'c', 'd', 'e']],
            'complex format' => [5, 'l_%02d', ['l_05', 'l_06', 'l_07', 'l_08']]
        ];
    }
}
