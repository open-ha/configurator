<?php

namespace OpenHa\Configurator\Platform\Core\Config\Autocomplete\Home;

use OpenHa\Configurator\Config\AutocompleteInterface;

class Spaces implements AutocompleteInterface
{
    public const ID_COUNTER_START = '97';

    public const ID_FORMAT = '%c';

    private function extractAllSpaceIds(array $spaces): array
    {
        return array_reduce(
            $spaces,
            fn(array $ids, $space) => is_array($space) && isset($space['id']) ? [...$ids, $space['id']] : $ids,
            []
        );
    }

    public function autocomplete(array $config): array
    {
        if (isset($config['spaces']) && is_array($config['spaces'])) {
            $idGen = \OpenHa\Configurator\Service\GeneratorFactory::create(
                \OpenHa\Configurator\Service\GeneratorFactory::FORMATTED_IDENTIFIER,
                static::ID_COUNTER_START,
                static::ID_FORMAT,
                $this->extractAllSpaceIds($config['spaces'])
            );
            $config['spaces'] = array_map(
                function ($space) use ($idGen) {
                    return is_array($space)
                        ? array_filter(['id' => $space['id'] ?? $idGen->next(), ...$space])
                        : $space;
                },
                $config['spaces']
            );
        }

        return $config;
    }
}
