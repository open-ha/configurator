<?php

namespace OpenHa\Configurator\Test\Unit\Config\Parser;

use OpenHa\Configurator\Config\Parser\Json;
use OpenHa\Configurator\Config\ParserInterface;
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

    public function testClassImplementsParserInterface(): void
    {
        $this->assertInstanceOf(ParserInterface::class, $this->instance);
    }

    /**
     * @dataProvider \OpenHa\Configurator\Test\Unit\DataProvider\Json::json
     * @dataProvider \OpenHa\Configurator\Test\Unit\DataProvider\Json::unescapedUtf8Json
     * @dataProvider \OpenHa\Configurator\Test\Unit\DataProvider\Json::escapedUtf8Json
     */
    public function testParseMethodReturnsArray(string $serializedConfig, array $config): void
    {
        $this->assertEquals($config, $this->instance->parse($serializedConfig));
    }

    /**
     * @dataProvider \OpenHa\Configurator\Test\Unit\DataProvider\Json::invalidJson
     */
    public function testParseMethodThrowsExceptionOnInvalidJson(string $serializedConfig): void
    {
        $this->expectException(\Exception::class);
        $this->instance->parse($serializedConfig);
    }
}
