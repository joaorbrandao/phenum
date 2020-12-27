<?php


namespace Joaorbrandao\Phenum\Exceptions;

use Exception;

class DuplicateConstant extends Exception
{
    public function __construct($constant = "", $value ="")
    {
        if (is_bool($value)) {
            $value = $value === true ? 'true' : 'false';
        }

        parent::__construct(
            "Constant '$constant' is already using the value '$value'!"
        );
    }
}
