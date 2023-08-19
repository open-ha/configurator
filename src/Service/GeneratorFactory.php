<?php

namespace OpenHa\Configurator\Service;

class GeneratorFactory
{
    public const FORMATTED_IDENTIFIER = 'FormattedIdentifier';

    /**
     * @psalm-param array $params
     */
    public static function create(string $name, ...$params): GeneratorInterface
    {
        $className = sprintf('%s\Generator\%s', __NAMESPACE__, $name);
        if (!class_exists($className)) {
            throw new \Exception(sprintf('Class %s does not exist', $className));
        }

        if (!is_subclass_of($className, GeneratorInterface::class)) {
            throw new \Exception(
                sprintf(
                    'Class %s does not implement %s interface',
                    $className,
                    GeneratorInterface::class
                )
            );
        }

        return new $className(...$params);
    }
}
