<?php

namespace OpenHa\Configurator\Test\Unit\DataProvider;

class Json
{
    public static function json(): array
    {
        return [
            'empty array' => ['[]', []],
            'array of various types' => [
                '["lorem","ipsum",1,9999,3.14,true,false,null]',
                ['lorem', 'ipsum', 1, 9999, 3.14, true, false, null]
            ],
            'associative array' => [
                '{"foo":"bar","lorem":"ipsum","pi":3.14,"boolean":false}',
                [
                    'foo' => 'bar',
                    'lorem' => 'ipsum',
                    'pi' => 3.14,
                    'boolean' => false
                ]
            ],
            'object with fields of various types' => [
                '{"order_id":"69","customer":{"name":"John Doe","country":"US"},"total":4.12,"new":true}',
                [
                    'order_id' => '69',
                    'customer' => [
                        'name' => 'John Doe',
                        'country' => 'US'
                    ],
                    'total' => 4.12,
                    'new' => true
                ]
            ],
            'object with array fields' => [
                '{"customer":{"name":"John Doe"},"strings":["lorem","ipsum"],"numbers":[1,9999,3.14]}',
                [
                    'customer' => [
                        'name' => 'John Doe'
                    ],
                    'strings' => ['lorem', 'ipsum'],
                    'numbers' => [1, 9999, 3.14]
                ]
            ]
        ];
    }

    public static function unescapedUtf8Json(): array
    {
        return [
            'unescaped polish texts' => [
                '{"texts":["Kto z woli i myśli zapragnie","pi spisać cyfry ten zdoła"],"pi":3.1415926535}',
                [
                    'texts' => ['Kto z woli i myśli zapragnie', 'pi spisać cyfry ten zdoła'],
                    'pi' => 3.1415926535
                ]
            ],
            'unescaped cyrillic script' => [
                '{"texts":["Слава Україні!","Героям Слава!"],"pi":3.14,"boolean":false}',
                [
                    'texts' => ['Слава Україні!', 'Героям Слава!'],
                    'pi' => 3.14,
                    'boolean' => false
                ]
            ],
            'unescaped emoticons' => [
                '{"texts":["😀","❤️","¯\\\\_(ツ)_\/¯"]}',
                [
                    'texts' => ['😀','❤️','¯\_(ツ)_/¯'],
                ]
            ]
        ];
    }

    public static function escapedUtf8Json(): array
    {
        // phpcs:disable Generic.Files.LineLength
        return [
            'escaped polish texts' => [
                '{"texts":["Kto z woli i my\u015bli zapragnie","pi spisa\u0107 cyfry ten zdo\u0142a"],"pi":3.1415926535}',
                [
                    'texts' => ['Kto z woli i myśli zapragnie', 'pi spisać cyfry ten zdoła'],
                    'pi' => 3.1415926535
                ]
            ],
            'escaped cyrillic script' => [
                '{"texts":["\u0421\u043b\u0430\u0432\u0430 \u0423\u043a\u0440\u0430\u0457\u043d\u0456!","\u0413\u0435\u0440\u043e\u044f\u043c \u0421\u043b\u0430\u0432\u0430!"],"pi":3.14,"boolean":false}',
                [
                    'texts' => ['Слава Україні!', 'Героям Слава!'],
                    'pi' => 3.14,
                    'boolean' => false
                ]
            ],
            'escaped emoticons' => [
                '{"texts":["\ud83d\ude00","\u2764\ufe0f","\u00af\\\\_(\u30c4)_\/\u00af"]}',
                [
                    'texts' => ['😀','❤️','¯\_(ツ)_/¯'],
                ]
            ]
        ];
        // phpcs:enable
    }

    public static function invalidJson(): array
    {
        return [
            'string literal' => ['Lorem ipsum dolor sit amet'],
            'number literal' => ['3.14'],
            'boolean literal' => ['true'],
            'null literal' => ['null']
        ];
    }

    public static function unserializableData(): array
    {
        return [
            'string literal' => ['Lorem ipsum dolor sit amet'],
            'number literal' => [3.14],
            'boolean literal' => [true],
            'null literal' => [null]
        ];
    }
}
