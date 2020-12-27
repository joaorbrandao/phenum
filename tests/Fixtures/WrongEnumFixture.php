<?php


namespace Joaorbrandao\Phenum\Tests\Fixtures;

use Joaorbrandao\Phenum\Classes\Enum;
use Joaorbrandao\Phenum\Traits\Enumerable;

class WrongEnumFixture extends Enum
{
    use Enumerable;

    const YES = true;
    const TEST_1 = 'adsfasdf';
    const TRUE = true;
}
