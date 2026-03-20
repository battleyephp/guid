<?php

declare(strict_types=1);

namespace BattlEye\Guid;

use InvalidArgumentException;
use Stringable;

final readonly class Guid implements Stringable
{
    public function __construct(private string $value)
    {
        if (in_array(preg_match('/^[a-f0-9]{32}$/', $this->value), [0, false], true)) {
            throw new InvalidArgumentException('Invalid GUID');
        }
    }

    /**
     * Get the GUID as a string.
     */
    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * Create a new GUID from a string.
     */
    public static function fromString(string $value): self
    {
        return new self($value);
    }

    /**
     * Create a new GUID from a SteamID64.
     */
    public static function fromSteamId64(int $steamId64): self
    {
        $string = '';

        for ($i = 0; $i < 8; $i++) {
            $string .= chr($steamId64 & 0xFF);
            $steamId64 >>= 8;
        }

        return new self(md5("BE$string"));
    }

    /**
     * Get the GUID as a string.
     */
    public function toString(): string
    {
        return $this->value;
    }

    /**
     * Check if the other GUID is the same.
     */
    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }
}
