<?php

namespace OpenHa\Configurator\Test\Unit\Platform\Core\Model;

use OpenHa\Configurator\Platform\Core\Api\Model\FeatureInterface;
use OpenHa\Configurator\Platform\Core\Api\Model\FeatureType;
use OpenHa\Configurator\Platform\Core\Model\Feature;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class FeatureTest extends TestCase
{
    public function testClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(
            Feature::class,
            new Feature(FeatureType::Light, 'LIGHT_ID')
        );
    }

    public function testClassImplementsFeatureInterface(): void
    {
        $this->assertInstanceOf(
            FeatureInterface::class,
            new Feature(FeatureType::Light, 'LIGHT_ID')
        );
    }

    public function testConstructorDisallowsNullId(): void
    {
        $this->expectException(\TypeError::class);
        /** @psalm-suppress NullArgument */
        new Feature(FeatureType::Light, null);
    }

    /**
     * @dataProvider correctFeatureIdsProvider
     */
    public function testItReturnsCorrectFeatureId(string $id): void
    {
        $this->assertEquals($id, (new Feature(FeatureType::Light, $id))->getId());
    }

    public function testConstructorAllowsNullTitle(): void
    {
        $this->assertNull((new Feature(FeatureType::Light, 'LIGHT_ID', null))->getTitle());
    }

    /**
     * @dataProvider correctFeatureTitlesProvider
     */
    public function testItReturnsCorrectFeatureTitle(string $title): void
    {
        $this->assertEquals($title, (new Feature(FeatureType::Light, 'LIGHT_ID', $title))->getTitle());
    }

    public function testItReturnsCorrectCustomData(): void
    {
        $data = ['key_1' => 'value_1', 'key_2' => 'value_2'];
        $feature = new Feature(FeatureType::Light, 'LIGHT_ID', null, $data);
        foreach ($data as $key => $value) {
            $this->assertEquals($value, $feature->getData($key));
        }
    }

    public function testItReturnsCorrectFeatureType(): void
    {
        $this->assertEquals(FeatureType::Light, (new Feature(FeatureType::Light, 'LIGHT_ID'))->getType());
    }

    public static function correctFeatureIdsProvider(): array
    {
        $featureIds = ['FEATURE_ID', '001', '1', 'feature'];
        return array_combine(
            $featureIds,
            array_map(
                fn($id) => [$id],
                $featureIds
            )
        );
    }

    public static function correctFeatureTitlesProvider(): array
    {
        return [
            'simple_title' => ['Simple title'],
        ];
    }
}
