<?php

namespace OpenHa\Configurator\Platform\Core\Model;

use OpenHa\Configurator\Platform\Core\Api\Model\LocationInterface;
use OpenHa\Configurator\Platform\Core\Api\Model\SpaceInterface;

readonly class Space extends AbstractModel implements SpaceInterface
{
    /**
     * @param string $id
     * @param ?string $title
     * @param array $data
     * @param Location[] $locations
     */
    public function __construct(
        string $id,
        ?string $title = null,
        array $data = [],
        private array $locations = []
    ) {
        parent::__construct($id, $title, $data);
    }

    /**
     * @return LocationInterface[]
     */
    public function getLocations(): array
    {
        return $this->locations;
    }
}
