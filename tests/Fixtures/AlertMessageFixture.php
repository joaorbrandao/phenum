<?php


namespace Joaorbrandao\Phenum\Tests\Fixtures;

use Joaorbrandao\Phenum\Classes\Enum;
use Joaorbrandao\Phenum\Traits\Enumerable;

class AlertMessageFixture extends Enum
{
    use Enumerable;

    const SUCCESS = 'success';
    const ERROR = 'danger';
    const WARNING = 'warning';
    const INFO = 'info';
}
