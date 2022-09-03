<?php

namespace OpenHa\Configurator\Test\Unit\Exception;

use OpenHa\Configurator\Exception\FileReadException;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class FileReadExceptionTest extends TestCase
{
    private FileReadException $instance;

    protected function setUp(): void
    {
        $this->instance = new FileReadException();
    }

    public function testClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(
            FileReadException::class,
            $this->instance
        );
    }

    public function testClassExtendsExceptionClass(): void
    {
        $this->assertInstanceOf(
            \Exception::class,
            $this->instance
        );
    }
}
