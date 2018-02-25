# sizer

## Objective
This is a utility class that tries to abstract bit/byte conversion away in a modern fashion which could be easily extended.

## Background
Currently, there are two major standards for `Kilo` in digital world. While IEEE sticks to the traditional definition of a kilo for bits and bytes, which is 1000, other standards such as JEDEC adopts the 2^10 (1024) to be the kilo. All definition of mega, giga, tera, etc. are affected based on the definition of a kilo.

## Sizer
An interface `Sizable` is defined for this purpose. There are two implementation of this interface each of which implements a different value for kilo. If at any point of time, a new definition emerges, it could be readily added to the system without touching the core functionality.

The main (and final) class is `Sizer`, which by composition accepts an implementation of the `Sizable` and does all the calculations accordingly. There are 14 `Named Constructors` that can create an object based on bits, bytes, kilobits, kilobytes, megabits, megabytes, gigabits, gigabytes, terabits, terabytes, petabits, petabytes, exabits, and exabytes. These named constructors, free the end-user from doing any calculation. Just choose the right named constructor and there you have an object that can easily convert between sizes.

Each of the named constructors accepts two inputs:
- An implementation of the `Sizable` which helps it know what the size of a kilo is
- And a value, that determines the quantity of data

Once instantiated, you can easily convert different sizes together using any of the following methods:
- toBits
- toBytes
- toKiloBits
- toKiloBytes
- toMegaBits
- toMegaBytes
- toGigaBits
- toGigaBytes
- toTeraBits
- toTeraBytes
- toPetaBits
- toPetaBytes
- toExaBits
- toExaBytes

## Example
```php
<?php

use Sizer\Sizer;
use Sizer\IEEESizer;

$sizer = Sizer::createFromMegaBytes(new IEEESizer(), 3);// initializes the object with 3MB
echo $sizer->toBytes();//3000000 bytes

$sizer = Sizer::createFromMegaBytes(new JEDECSizer(), 3);// initializes the object with 3MB
echo $sizer->toBytes();//3145728 bytes
```

## Tests
To run the tests, you need PHPUnit 7 to be installed first. Then simply execute the following command
`phpunit`

## Notes
This is PHP7-compliant