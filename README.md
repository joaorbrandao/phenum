# PHENUMS
This package creates a simple way of creating PHP enums.
Your IDE will detect them without using DocBlocks. In the end, it's all about PHP constants! <br>
<b>This package is still under development! Do not use it in production.</b>

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

class Fruit extends Enum
{
    use Enumerable;

    const APPLE = 'apple';
    const BANANA = 'banana';
}
```

### Use it
We're talking about PHP constants, so:
```php
<?php

$apple = Fruit::APPLE;
```
But in case you need some help like getting all defined values, the first, last, etc:
```php
<?php
$first = Fruit::first(); // 'apple'
$last = Fruit::last(); // 'banana'
$exists = Fruit::exists('apple'); // true
```

## License
phenum is an open-source package licensed under the MIT license.