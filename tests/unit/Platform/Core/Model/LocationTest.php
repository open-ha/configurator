<?php

namespace OpenHa\Configurator\Test\Unit\Platform\Core\Model;

use OpenHa\Configurator\Platform\Core\Api\Model\LocationInterface;
use OpenHa\Configurator\Platform\Core\Model\Location;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class LocationTest extends TestCase
{
    public function testClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(
            Location::class,
            new Location('LOCATION_ID')
        );
    }

    public function testClassImplementsLocationInterface(): void
    {
        $this->assertInstanceOf(
            LocationInterface::class,
            new Location('LOCATION_ID')
        );
    }

    public function testConstructorDisallowsNullId(): void
    {
        $this->expectException(\TypeError::class);
        /** @psalm-suppress NullArgument */
        new Location(null);
    }

    /**
     * @dataProvider correctLocationIdsProvider
     */
    public function testItReturnsCorrectLocationId(string $id): void
    {
        $this->assertEquals($id, (new Location($id))->getId());
    }

    public function testConstructorAllowsNullTitle(): void
    {
        $this->assertNull((new Location('LOCATION_ID', null))->getTitle());
    }

    /**
     * @dataProvider correctLocationTitlesProvider
     */
    public function testItReturnsCorrectLocationTitle(string $title): void
    {
        $this->assertEquals($title, (new Location('LOCATION_ID', $title))->getTitle());
    }

    public function testItReturnsCorrectCustomData(): void
    {
        $data = ['key_1' => 'value_1', 'key_2' => 'value_2'];
        $location = new Location('LOCATION_ID', null, $data);
        foreach ($data as $key => $value) {
            $this->assertEquals($value, $location->getData($key));
        }
    }

    public static function correctLocationIdsProvider(): array
    {
        $locationIds = ['LOCATION_ID', '001', '1', 'location'];
        return array_combine(
            $locationIds,
            array_map(
                fn($id) => [$id],
                $locationIds
            )
        );
    }

    public static function correctLocationTitlesProvider(): array
    {
        return [
            'simple_title' => ['Simple title'],
        ];
    }
}
