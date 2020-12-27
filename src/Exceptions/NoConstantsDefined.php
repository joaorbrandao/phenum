<?php


namespace Joaorbrandao\Phenum\Exceptions;

use Exception;
use Throwable;

class NoConstantsDefined extends Exception
{
    public function __construct($class = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct(
            "Class '$class' does not contain any constant defined",
            $code,
            $previous
        );
    }
}
