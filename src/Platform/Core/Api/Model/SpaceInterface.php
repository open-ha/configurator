<?php

namespace OpenHa\Configurator\Platform\Core\Api\Model;

interface SpaceInterface extends IdentifiableInterface, TitleableInterface, CustomizableInterface
{
    /**
     * @return LocationInterface[]
     */
    public function getLocations(): array;
}
