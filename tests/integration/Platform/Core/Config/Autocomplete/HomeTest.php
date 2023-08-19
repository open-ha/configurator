<?php

namespace OpenHa\Configurator\Test\Integration\Platform\Core\Config\Autocomplete;

use OpenHa\Configurator\Platform\Core\Config\Autocomplete\Home as HomeConfigAutocomplete;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class HomeTest extends TestCase
{
    private HomeConfigAutocomplete $instance;

    protected function setUp(): void
    {
        $this->instance = new HomeConfigAutocomplete();
    }

    /**
     * @dataProvider \OpenHa\Configurator\Test\Integration\DataProvider\HomeConfig::completableHomeConfig
     */
    public function testAutocompleteMethodAutocompletesConfig(
        array $incompleteConfig,
        array $completedConfig
    ): void {
        $this->assertEquals($completedConfig, $this->instance->autocomplete($incompleteConfig));
    }
}
