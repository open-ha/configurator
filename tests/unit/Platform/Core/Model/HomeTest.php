<?php

namespace OpenHa\Configurator\Test\Unit\Platform\Core\Model;

use OpenHa\Configurator\Platform\Core\Api\Model\HomeInterface;
use OpenHa\Configurator\Platform\Core\Model\Home;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class HomeTest extends TestCase
{
    public function testClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(
            Home::class,
            new Home()
        );
    }

    public function testClassImplementsHomeInterface(): void
    {
        $this->assertInstanceOf(
            HomeInterface::class,
            new Home()
        );
    }

    public function testConstructorDisallowsNullId(): void
    {
        $this->expectException(\TypeError::class);
        /** @psalm-suppress NullArgument */
        new Home(null);
    }

    public function testConstructorSetsDefaultValueForOmittedId(): void
    {
        $this->assertEquals(Home::DEFAULT_HOME_ID, (new Home())->getId());
    }

    /**
     * @dataProvider correctHomeIdsProvider
     */
    public function testItReturnsCorrectHomeId(string $id): void
    {
        $this->assertEquals($id, (new Home($id))->getId());
    }

    public function testConstructorAllowsNullTitle(): void
    {
        $this->assertNull((new Home('HOME_ID', null))->getTitle());
    }

    /**
     * @dataProvider correctHomeTitlesProvider
     */
    public function testItReturnsCorrectHomeTitle(string $title): void
    {
        $this->assertEquals($title, (new Home('HOME_ID', $title))->getTitle());
    }

    public function testItReturnsCorrectCustomData(): void
    {
        $data = ['key_1' => 'value_1', 'key_2' => 'value_2'];
        $home = new Home('HOME_ID', null, $data);
        foreach ($data as $key => $value) {
            $this->assertEquals($value, $home->getData($key));
        }
    }

    public static function correctHomeIdsProvider(): array
    {
        $homeIds = ['HOME_ID', '001', '1', 'home'];
        return array_combine(
            $homeIds,
            array_map(
                fn($id) => [$id],
                $homeIds
            )
        );
    }

    public static function correctHomeTitlesProvider(): array
    {
        return [
            'simple_title' => ['Simple title'],
        ];
    }
}
