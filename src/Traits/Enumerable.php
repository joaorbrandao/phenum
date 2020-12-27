<?php


namespace Joaorbrandao\Phenum\Traits;

use Joaorbrandao\Phenum\Classes\Enum;

trait Enumerable
{
    public static function __callStatic($name, $arguments)
    {
        $enum = new Enum(self::class);
        return $enum::{$name}(...$arguments);
    }
}
