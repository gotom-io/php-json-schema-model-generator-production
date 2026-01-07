<?php

declare(strict_types = 1);

namespace PHPModelGenerator\Exception\Generic;

use PHPModelGenerator\Exception\ValidationException;

/**
 * Class InvalidConstException
 *
 * @package PHPModelGenerator\Exception\Generic
 */
class InvalidConstDetailedException extends ValidationException
{
    /** @var mixed */
    protected $expectedValue;

    /**
     * InvalidConstException constructor.
     *
     * @param $providedValue
     * @param string $propertyName
     * @param mixed $expectedValue
     */
    public function __construct($providedValue, string $propertyName, $expectedValue)
    {
        $this->expectedValue= $expectedValue;

        $providedValueEncoded = json_encode(
            $providedValue,
            JSON_PARTIAL_OUTPUT_ON_ERROR
            | JSON_THROW_ON_ERROR
            | JSON_PRETTY_PRINT
        );
        $expectedValueEncoded = json_encode(
            $expectedValue,
            JSON_PARTIAL_OUTPUT_ON_ERROR
            | JSON_THROW_ON_ERROR
            | JSON_PRETTY_PRINT
        );

        parent::__construct(
            "Invalid value for `$propertyName` declined by const constraint. Given: `" . $providedValueEncoded . '` expected: `' . $expectedValueEncoded . '`',
            $propertyName,
            $providedValue
        );
    }

    /**
     * @return mixed
     */
    public function getExpectedValue()
    {
        return $this->expectedValue;
    }
}
