# PHENUM
This package creates a simple way of creating PHP enums (one more!).
Your IDE will detect them without using DocBlocks. In the end, it's all about PHP constants!

## Installing 
```shell
composer require joaorbrandao/phenums
```

## Usage
### Create an Enum
1. Create a class.
2. Extend the `Enum` class.
3. Use the `Enumerable` trait.
4. Define PHP constants as needed.
```php
<?php
namespace Acme;

use Joaorbrandao\Phenum\Classes\Enum;
use Joaorbrandao\Phenum\Traits\Enumerable;

class Peripheral extends Enum
{
    use Enumerable;

    const MOUSE = 'mouse';
    const KEYBOARD = 'keyboard';
}
```

### Use it
We're talking about PHP constants, so:
```php
<?php

$mouse = Peripheral::MOUSE;
```
But in case you need some help like getting all defined values, the first, last, etc:
```php
<?php
$first = Peripheral::first(); // 'mouse'
$last = Peripheral::last(); // 'keyboard'
$exists = Peripheral::exists('mouse'); // true
```

## License
phenum is an open-source package licensed under the MIT license.