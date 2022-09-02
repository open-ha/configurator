<?php

namespace OpenHa\Configurator\Test\Unit\File;

use OpenHa\Configurator\File\Writer;
use OpenHa\Configurator\File\WriterInterface;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class WriterTest extends TestCase
{
    private Writer $instance;
    private vfsStreamDirectory $fsRoot;

    protected function setUp(): void
    {
        $this->instance = new Writer();
        $this->fsRoot = vfsStream::setup();
    }

    public function testClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(Writer::class, $this->instance);
    }

    public function testClassImplementsWriterInterface(): void
    {
        $this->assertInstanceOf(WriterInterface::class, $this->instance);
    }

    /**
     * @dataProvider \OpenHa\Configurator\Test\Unit\DataProvider\FileContent::fileContent
     */
    public function testWriteMethodWritesContentToFile(string $path, string $content): void
    {
        $vfsPath = sprintf('%s/%s', $this->fsRoot->url(), $path);
        $this->instance->write($vfsPath, $content);
        $this->assertEquals($content, file_get_contents($vfsPath));
    }
}
