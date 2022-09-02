<?php

namespace OpenHa\Configurator\Test\Unit\DataProvider;

class FileContent
{
    public static function fileContent(): array
    {
        return [
            'ASCII chars single line' => ['lorem.txt', 'Lorem ipsum dolor sit amet'],
            'UTF-8 chars single line' => ['utf8.txt', 'Слава Україні! Героям Слава!'],
            'empty string' => ['empty_file', ''],
            'empty JSON object' => ['empty_object.json', '{}'],
            'JSON object' => ['order.json', '{"customer":{"name":"John Doe","country":"US"},"order_total":4.12}']
        ];
    }
}
