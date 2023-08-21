<?php

namespace OpenHa\Configurator\Test\Unit\Platform\Core\Model;

use OpenHa\Configurator\Platform\Core\Api\Model\SpaceInterface;
use OpenHa\Configurator\Platform\Core\Model\Space;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class SpaceTest extends TestCase
{
    public function testClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(
            Space::class,
            new Space('SPACE_ID')
        );
    }

    public function testClassImplementsSpaceInterface(): void
    {
        $this->assertInstanceOf(
            SpaceInterface::class,
            new Space('SPACE_ID')
        );
    }

    public function testConstructorDisallowsNullId(): void
    {
        $this->expectException(\TypeError::class);
        /** @psalm-suppress NullArgument */
        new Space(null);
    }

    /**
     * @dataProvider correctSpaceIdsProvider
     */
    public function testItReturnsCorrectSpaceId(string $id): void
    {
        $this->assertEquals($id, (new Space($id))->getId());
    }

    public function testConstructorAllowsNullTitle(): void
    {
        $this->assertNull((new Space('SPACE_ID', null))->getTitle());
    }

    /**
     * @dataProvider correctSpaceTitlesProvider
     */
    public function testItReturnsCorrectSpaceTitle(string $title): void
    {
        $this->assertEquals($title, (new Space('SPACE_ID', $title))->getTitle());
    }

    public function testItReturnsCorrectCustomData(): void
    {
        $data = ['key_1' => 'value_1', 'key_2' => 'value_2'];
        $space = new Space('SPACE_ID', null, $data);
        foreach ($data as $key => $value) {
            $this->assertEquals($value, $space->getData($key));
        }
    }

    public static function correctSpaceIdsProvider(): array
    {
        $spaceIds = ['SPACE_ID', '001', '1', 'space'];
        return array_combine(
            $spaceIds,
            array_map(
                fn($id) => [$id],
                $spaceIds
            )
        );
    }

    public static function correctSpaceTitlesProvider(): array
    {
        return [
            'simple_title' => ['Simple title'],
        ];
    }
}
