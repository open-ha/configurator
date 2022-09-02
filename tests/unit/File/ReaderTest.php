<?php

namespace OpenHa\Configurator\Test\Unit\File;

use OpenHa\Configurator\File\Reader;
use OpenHa\Configurator\File\ReaderInterface;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class ReaderTest extends TestCase
{
    private Reader $instance;
    private vfsStreamDirectory $fsRoot;

    protected function setUp(): void
    {
        $this->instance = new Reader();
        $this->fsRoot = vfsStream::setup();
    }

    protected function createFileMock(string $path, string $content): string
    {
        return vfsStream::newFile($path)
            ->at($this->fsRoot)
            ->setContent($content)
            ->url();
    }

    public function testClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(Reader::class, $this->instance);
    }

    public function testClassImplementsReaderInterface(): void
    {
        $this->assertInstanceOf(ReaderInterface::class, $this->instance);
    }

    /**
     * @dataProvider \OpenHa\Configurator\Test\Unit\DataProvider\FileContent::fileContent
     */
    public function testReadMethodReturnsFileContent(string $path, string $content): void
    {
        $vfsPath = $this->createFileMock($path, $content);
        $this->assertEquals($content, $this->instance->read($vfsPath));
    }
}
