<?php

namespace OpenHa\Configurator\Platform\Core\Model;

use OpenHa\Configurator\Platform\Core\Api\Model\FeatureInterface;
use OpenHa\Configurator\Platform\Core\Api\Model\FeatureType;
use OpenHa\Configurator\Platform\Core\Api\PlatformInterface;

readonly class Feature extends AbstractModel implements FeatureInterface
{
    public function __construct(
        private FeatureType $type,
        string $id,
        ?string $title = null,
        array $data = []
    ) {
        parent::__construct($id, $title, $data);
    }

    public function getType(): FeatureType
    {
        return $this->type;
    }
}
