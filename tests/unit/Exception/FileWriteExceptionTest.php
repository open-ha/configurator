<?php

namespace OpenHa\Configurator\Test\Unit\Exception;

use OpenHa\Configurator\Exception\FileWriteException;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class FileWriteExceptionTest extends TestCase
{
    private FileWriteException $instance;

    public function setUp(): void
    {
        $this->instance = new FileWriteException();
    }

    public function testClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(
            FileWriteException::class,
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
