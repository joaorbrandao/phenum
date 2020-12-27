<?php


namespace Joaorbrandao\Phenum\Exceptions;

use Exception;
use Throwable;

class EnumValueNotFound extends Exception
{
    public function __construct($value = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct(
            "Couldn't find the constant name for enum value '$value'",
            $code,
            $previous
        );
    }
}
