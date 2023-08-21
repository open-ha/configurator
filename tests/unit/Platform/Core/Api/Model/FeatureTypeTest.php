<?php

namespace OpenHa\Configurator\Test\Unit\Platform\Core\Api\Model;

use OpenHa\Configurator\Platform\Core\Api\Model\FeatureType;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class FeatureTypeTest extends TestCase
{
    /**
     * @dataProvider \OpenHa\Configurator\Test\Unit\DataProvider\FeatureType::pluralFeatureTypes
     */
    public function testSingularifyMethodReturnsCorrectFeatureType(
        string $features,
        FeatureType $featureType
    ): void {
        $this->assertEquals(
            $featureType,
            FeatureType::singularify($features)
        );
    }

    /**
     * @dataProvider \OpenHa\Configurator\Test\Unit\DataProvider\FeatureType::featureTypes
     */
    public function testSingularifyMethodReturnsCorrectFeatureTypeForSingularFeatureName(
        string $feature,
        FeatureType $featureType
    ): void {
        $this->assertEquals(
            $featureType,
            FeatureType::singularify($feature)
        );
    }
}
