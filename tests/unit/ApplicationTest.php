<?php

namespace OpenHa\Configurator\Test\Unit;

use OpenHa\Configurator\Application;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class ApplicationTest extends TestCase
{
    public function testClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(
            Application::class,
            new Application()
        );
    }
}
