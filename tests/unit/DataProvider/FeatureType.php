<?php

namespace OpenHa\Configurator\Test\Unit\DataProvider;

class FeatureType
{
    public static function featureTypes(): array
    {
        return [
            'light' => ['light', \OpenHa\Configurator\Platform\Core\Api\Model\FeatureType::Light],
            'RGB light' => ['rgb_light', \OpenHa\Configurator\Platform\Core\Api\Model\FeatureType::RgbLight],
            'shutter' => ['shutter', \OpenHa\Configurator\Platform\Core\Api\Model\FeatureType::Shutter],
            'heating' => ['heating', \OpenHa\Configurator\Platform\Core\Api\Model\FeatureType::Heating]
        ];
    }

    public static function pluralFeatureTypes(): array
    {
        return [
            'lights' => ['lights', \OpenHa\Configurator\Platform\Core\Api\Model\FeatureType::Light],
            'RGB lights' => ['rgb_lights', \OpenHa\Configurator\Platform\Core\Api\Model\FeatureType::RgbLight],
            'shutters' => ['shutters', \OpenHa\Configurator\Platform\Core\Api\Model\FeatureType::Shutter],
            'heatings' => ['heatings', \OpenHa\Configurator\Platform\Core\Api\Model\FeatureType::Heating]
        ];
    }
}
