<?php

namespace OpenHa\Configurator\Platform\Core\Model;

use OpenHa\Configurator\Platform\Core\Api\Model\HomeInterface;
use OpenHa\Configurator\Platform\Core\Api\Model\SpaceInterface;

readonly class Home extends AbstractModel implements HomeInterface
{
    public const DEFAULT_HOME_ID = 'home';

    /**
     * @param string $id
     * @param ?string $title
     * @param array $data
     * @param Space[] $spaces
     */
    public function __construct(
        string $id = self::DEFAULT_HOME_ID,
        ?string $title = null,
        array $data = [],
        private array $spaces = []
    ) {
        parent::__construct($id, $title, $data);
    }

    /**
     * @return SpaceInterface[]
     */
    public function getSpaces(): array
    {
        return $this->spaces;
    }
}
