<?php

namespace OpenHa\Configurator\Platform\Core\Api\Model;

interface LocationInterface extends IdentifiableInterface, TitleableInterface, CustomizableInterface
{
    /**
     * @return FeatureInterface[]
     */
    public function getFeatures(): array;
}
