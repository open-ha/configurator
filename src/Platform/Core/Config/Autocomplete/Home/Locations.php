<?php

namespace OpenHa\Configurator\Platform\Core\Config\Autocomplete\Home;

use OpenHa\Configurator\Config\AutocompleteInterface;

class Locations implements AutocompleteInterface
{
    public const ID_COUNTER_START = '1';

    public const ID_FORMAT = '%s%%02d';

    private function extractAllLocationIds(array $spaces): array
    {
        return array_reduce(
            $spaces,
            fn(array $ids, array $space) => isset($space['locations']) && is_array($space['locations']) ?
                [...$ids, ...array_reduce(
                    $space['locations'],
                    fn(array $ids, $location) => is_array($location) && isset($location['id']) ?
                        [...$ids, $location['id']] :
                        $ids,
                    []
                )] :
                $ids,
            []
        );
    }

    public function autocomplete(array $config): array
    {
        if (isset($config['spaces']) && is_array($config['spaces'])) {
            /** @var array $space */
            foreach ($config['spaces'] as $idx => $space) {
                if (isset($space['id']) && isset($space['locations']) && is_array($space['locations'])) {
                    $idGen = \OpenHa\Configurator\Service\GeneratorFactory::create(
                        \OpenHa\Configurator\Service\GeneratorFactory::FORMATTED_IDENTIFIER,
                        static::ID_COUNTER_START,
                        sprintf((string)static::ID_FORMAT, (string)$space['id']),
                        $this->extractAllLocationIds($config['spaces'])
                    );
                    /** @psalm-suppress MixedArrayAssignment */
                    $config['spaces'][$idx]['locations'] = array_map(
                        function ($location) use ($idGen) {
                            return is_array($location)
                                ? array_filter(['id' => (string)($location['id'] ?? $idGen->next()), ...$location])
                                : $location;
                        },
                        $space['locations']
                    );
                }
            }
        }
        return $config;
    }
}
