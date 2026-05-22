<?php

declare(strict_types=1);

namespace PHPModelGenerator\Exception\Generic;

use PHPModelGenerator\Exception\ValidationException;

/**
 * Class EnumException
 *
 * @package PHPModelGenerator\Exception\Generic
 */
class EnumException extends ValidationException
{
    /**
     * EnumException constructor.
     *
     * @param $providedValue
     */
    public function __construct($providedValue, string $propertyName, protected array $allowedValues)
    {
        parent::__construct(
            "Invalid value for property: '$propertyName' declined by enum constraint, allowed values: [" . implode(', ', $this->allowedValues ). ']',
            $propertyName,
            $providedValue
        );
    }

    public function getAllowedValues(): array
    {
        return $this->allowedValues;
    }
}
