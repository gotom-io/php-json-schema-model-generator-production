<?php

namespace PHPModelGenerator\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class JsonFieldName
{
    public function __construct(
        public string $name
    ) {
    }
}

