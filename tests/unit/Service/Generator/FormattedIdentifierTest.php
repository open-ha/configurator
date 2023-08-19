<?php

namespace OpenHa\Configurator\Test\Unit\Service\Generator;

use OpenHa\Configurator\Service\Generator\FormattedIdentifier as FormattedIdentifierGenerator;
use OpenHa\Configurator\Service\GeneratorInterface;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class FormattedIdentifierTest extends TestCase
{
    public function testClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(
            FormattedIdentifierGenerator::class,
            new FormattedIdentifierGenerator(1, '%d')
        );
    }

    public function testClassImplementsAutocompleteInterface(): void
    {
        $this->assertInstanceOf(
            GeneratorInterface::class,
            new FormattedIdentifierGenerator(1, '%d')
        );
    }

    /**
     * @dataProvider \OpenHa\Configurator\Test\Unit\DataProvider\Generator::formattedIdentifier
     */
    public function testNextMethodReturnsCorrectIdentifier(int $counter, string $format, array $expectedIds): void
    {
        $gen = new FormattedIdentifierGenerator($counter, $format);
        /** @var int $id */
        foreach ($expectedIds as $id) {
            $this->assertEquals($id, $gen->next());
        }
    }
}
