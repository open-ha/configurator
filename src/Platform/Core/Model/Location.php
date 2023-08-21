<?php

namespace OpenHa\Configurator\Platform\Core\Model;

use OpenHa\Configurator\Platform\Core\Api\Model\LocationInterface;

readonly class Location extends AbstractModel implements LocationInterface
{
    /**
     * @param string $id
     * @param ?string $title
     * @param array $data
     * @param Feature[] $features
     */
    public function __construct(
        string $id,
        ?string $title = null,
        array $data = [],
        private array $features = []
    ) {
        parent::__construct($id, $title, $data);
    }

    public function getFeatures(): array
    {
        return $this->features;
    }
}
