<?php

namespace OpenHa\Configurator\Test\Unit\Config\Serializer;

use OpenHa\Configurator\Config\Serializer\Json;
use OpenHa\Configurator\Config\SerializerInterface;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class JsonTest extends TestCase
{
    private Json $instance;

    protected function setUp(): void
    {
        $this->instance = new Json();
    }

    public function testClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(Json::class, $this->instance);
    }

    public function testClassImplementsSerializerInterface(): void
    {
        $this->assertInstanceOf(SerializerInterface::class, $this->instance);
    }

    /**
     * @dataProvider \OpenHa\Configurator\Test\Unit\DataProvider\Json::json
     * @dataProvider \OpenHa\Configurator\Test\Unit\DataProvider\Json::unescapedUtf8Json
     */
    public function testSerializeMethodReturnsString(string $serializedConfig, array $config): void
    {
        $this->assertEquals($serializedConfig, $this->instance->serialize($config));
    }

    /**
     * @dataProvider \OpenHa\Configurator\Test\Unit\DataProvider\Json::unserializableData
     * @psalm-suppress MissingParamType, MixedArgument
     */
    public function testSerializeMethodRaisesErrorOnUnserializableData($config): void
    {
        $this->expectException(\TypeError::class);
        $this->instance->serialize($config);
    }
}
