<?php

namespace OpenHa\Configurator\Platform\Core\Api\Model;

interface HomeInterface extends IdentifiableInterface, TitleableInterface, CustomizableInterface
{
    /**
     * @return SpaceInterface[]
     */
    public function getSpaces(): array;
}
