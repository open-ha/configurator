<?php

namespace OpenHa\Configurator\Test\Integration\DataProvider;

class HomeConfig
{
    public static function completableHomeConfig(): array
    {
        return [
            'empty config' => [[], ['id' => 'home']],
            'the simplest config' => [['id' => 'my_home'], ['id' => 'my_home']],
            'unknown spaces' => [
                [
                    'spaces' => [[], []]
                ],
                [
                    'id' => 'home',
                    'spaces' => [
                        ['id' => 'a'],
                        ['id' => 'b'],
                    ]
                ]
            ],
            'unknown spaces and locations' => [
                [
                    'spaces' => [
                        ['locations' => [[], [], []]],
                        ['locations' => [[]]],
                    ]
                ],
                [
                    'id' => 'home',
                    'spaces' => [
                        [
                            'id' => 'a',
                            'locations' => [
                                ['id' => 'a01'],
                                ['id' => 'a02'],
                                ['id' => 'a03']
                            ]
                        ],
                        [
                            'id' => 'b',
                            'locations' => [
                                ['id' => 'b01']
                            ]
                        ],
                    ]
                ]
            ],
            'invalid spaces' => [
                [
                    'spaces' => ['not an array']
                ],
                [
                    'id' => 'home',
                    'spaces' => ['not an array']
                ]
            ],
            'invalid locations' => [
                [
                    'id' => 'home',
                    'spaces' => [
                        [
                            'id' => 'a',
                            'locations' => ['not an array']
                        ],
                    ]
                ],
                [
                    'id' => 'home',
                    'spaces' => [
                        [
                            'id' => 'a',
                            'locations' => ['not an array']
                        ],
                    ]
                ]
            ]
        ];
    }
}
