<?php

declare(strict_types=1);

use BattlEye\Guid\Exceptions\InvalidGuidException;
use BattlEye\Guid\Guid;

it('can be casted as string', function () {
    $guid = new Guid('a0d1158281d8639495a1908b5a802470');

    expect((string) $guid)
        ->toBeString()
        ->toBe('a0d1158281d8639495a1908b5a802470');
});

it('can be created statically from string', function () {
    expect(Guid::fromString('a0d1158281d8639495a1908b5a802470'))
        ->toBeInstanceOf(Guid::class);
});

it('can be created statically from SteamID64', function () {
    $guid = Guid::fromSteamId64(76561198066209976);

    expect($guid)
        ->toBeInstanceOf(Guid::class)
        ->and($guid->toString())
        ->toBe('a0d1158281d8639495a1908b5a802470');
});

it('throws an exception with invalid string', function () {
    expect(function () {
        new Guid('invalid');
    })->toThrow(
        InvalidGuidException::class,
        'Value "invalid" is not a valid GUID.'
    );
});

it('checks same GUIDs', function () {
    $first = new Guid('a0d1158281d8639495a1908b5a802470');
    $second = new Guid('a0d1158281d8639495a1908b5a802470');

    expect($first->equals($second))
        ->toBeTrue()
        ->and($second->equals($first))
        ->toBeTrue();
});
