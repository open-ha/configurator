<?php

namespace OpenHa\Configurator\Platform\Core\Model;

use OpenHa\Configurator\Platform\Core\Api\Model\CustomizableInterface;
use OpenHa\Configurator\Platform\Core\Api\Model\IdentifiableInterface;
use OpenHa\Configurator\Platform\Core\Api\Model\TitleableInterface;

abstract readonly class AbstractModel implements IdentifiableInterface, TitleableInterface, CustomizableInterface
{
    public function __construct(
        protected string $id,
        protected ?string $title = null,
        protected array $data = []
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getData(string $key): mixed
    {
        return $this->data[$key] ?? null;
    }
}
