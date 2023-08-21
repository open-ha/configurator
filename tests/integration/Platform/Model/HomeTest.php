<?php

namespace OpenHa\Configurator\Test\Integration\Platform\Model;

use OpenHa\Configurator\Platform\Core\Model\Home;
use OpenHa\Configurator\Platform\Core\Model\Space;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class HomeTest extends TestCase
{
    public function testItReturnsCorrectSpacesArray(): void
    {
        $spaces = [new Space('SPACE_1'), new Space('SPACE_2'), new Space('SPACE_3')];
        $home = new Home('HOME_ID', null, [], $spaces);
        $this->assertEquals($spaces, $home->getSpaces());
    }
}
