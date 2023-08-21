<?php

namespace OpenHa\Configurator\Test\Integration\Platform\Core\Api\Model;

use OpenHa\Configurator\Platform\Core\Api\Model\FeatureType;
use OpenHa\Configurator\Platform\Core\Model\Feature;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class FeatureTypeTest extends TestCase
{
    public function testFeatureClassIsInstantiatedForAllFeatureTypes(): void
    {
        foreach (FeatureType::cases() as $featureType) {
            $feature = new Feature($featureType, 'FEATURE_ID');
            $this->assertInstanceOf(Feature::class, $feature);
        }
    }
}
