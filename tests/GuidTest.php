<?php

declare(strict_types=1);

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
    expect(Guid::fromSteamId64(76561198066209976))
        ->toBeInstanceOf(Guid::class)
        ->toString()->toBe('a0d1158281d8639495a1908b5a802470');
});

it('throws an exception with invalid string', function () {
    expect(function () {
        new Guid('invalid');
    })->toThrow(InvalidArgumentException::class);
});
