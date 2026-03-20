# PHP BattlEye GUID

[![Latest Version on Packagist](https://img.shields.io/packagist/v/battleyephp/guid.svg?style=flat-square)](https://packagist.org/packages/battleyephp/guid)
[![Tests](https://img.shields.io/github/actions/workflow/status/battleyephp/guid/tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/battleyephp/guid/actions/workflows/tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/battleyephp/guid.svg?style=flat-square)](https://packagist.org/packages/battleyephp/guid)

It provides BattlEye GUID value object.  
It also can be converted from SteamID64.

## Installation

> **Requires [PHP 8.3+](https://php.net/releases/)**

You can install the package via composer:

```bash
composer require battleyephp/guid
```

## Usage

To create a GUID from a SteamID64:

```php
use BattlEye\Guid\Guid;

$guid = Guid::fromSteamId64(76561198066209976);

echo $guid->toString(); // 'a0d1158281d8639495a1908b5a802470'

// It is stringable, so you can
// cast it to the string.
echo (string) $guid;
```

You can pass an already calculated GUID string to create an object:

```php
use BattlEye\Guid\Guid;

$guid = Guid::fromString('a0d1158281d8639495a1908b5a802470');
// same as
$guid = new Guid('a0d1158281d8639495a1908b5a802470');
```

> Note: It can contain only valid MD5 hash, otherwise it throws an exception.

```php
use BattlEye\Guid\Exceptions\InvalidGuidException;
use BattlEye\Guid\Guid;

try {
    Guid::fromString('invalid');
} catch (InvalidGuidException) {
    // ...
}
```

Shortcut method to check if GUIDs are the same:

```php
use BattlEye\Guid\Guid;

$one = Guid::fromString('a0d1158281d8639495a1908b5a802470');
$two = Guid::fromSteamId64(76561198066209976);

if ($one->equals($two)) {
    // they are the same...
}
```

## Testing

```bash
composer test
```
