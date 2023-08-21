<?php

namespace OpenHa\Configurator\Platform\Core\Api\Model;

enum FeatureType: string
{
    case Light = 'light';
    case RgbLight = 'rgb_light';
    case Heating = 'heating';
    case Shutter = 'shutter';

    public static function singularify(string $features): ?FeatureType
    {
        return FeatureType::tryFrom(rtrim($features, 's'));
    }
}
