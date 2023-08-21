<?php

namespace OpenHa\Configurator\Platform\Core\Api\Model;

use OpenHa\Configurator\Platform\Core\Api\PlatformInterface;

interface FeatureInterface extends IdentifiableInterface, TitleableInterface, CustomizableInterface
{
    public function getType(): FeatureType;
}
