<?php

namespace OpenHa\Configurator\Test\Integration\Platform\Model;

use OpenHa\Configurator\Platform\Core\Model\Location;
use OpenHa\Configurator\Platform\Core\Model\Space;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class SpaceTest extends TestCase
{
    public function testItReturnsCorrectLocationsArray(): void
    {
        $locations = [new Location('LOCATION_1'), new Location('LOCATION_2'), new Location('LOCATION_3')];
        $space = new Space('SPACE_ID', null, [], $locations);
        $this->assertEquals($locations, $space->getLocations());
    }
}
