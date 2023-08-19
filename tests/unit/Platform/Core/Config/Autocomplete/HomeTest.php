<?php

namespace OpenHa\Configurator\Test\Unit\Platform\Core\Config\Autocomplete;

use OpenHa\Configurator\Platform\Core\Config\Autocomplete\Home as HomeConfigAutocomplete;
use OpenHa\Configurator\Config\AutocompleteInterface;
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

    public function testClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(HomeConfigAutocomplete::class, $this->instance);
    }

    public function testClassImplementsAutocompleteInterface(): void
    {
        $this->assertInstanceOf(AutocompleteInterface::class, $this->instance);
    }
}
