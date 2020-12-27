<?php


namespace Joaorbrandao\Phenum\Classes;

use Joaorbrandao\Phenum\Traits\EnumOperations;
use Joaorbrandao\Phenum\Validators\EnumsValidator;

class Enum
{
    use EnumOperations;

    protected static $class;

    public function __construct(string $child)
    {
        self::$class = $child;
        (new EnumsValidator())->validate($child);
    }
}
