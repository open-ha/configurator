<?php

namespace OpenHa\Configurator\Test\Integration\Platform\Model;

use OpenHa\Configurator\Platform\Core\Api\Model\FeatureType;
use OpenHa\Configurator\Platform\Core\Model\Feature;
use OpenHa\Configurator\Platform\Core\Model\Location;
use OpenHa\Configurator\Platform\Core\Model\Space;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class LocationTest extends TestCase
{
    public function testItReturnsCorrectFeaturesArray(): void
    {
        $features = array_map(
            fn(FeatureType $type) => new Feature($type, sprintf('%s_1', $type->value)),
            FeatureType::cases()
        );
        $location = new Location('LOCATION_ID', null, [], $features);
        $this->assertEquals($features, $location->getFeatures());
    }
}
