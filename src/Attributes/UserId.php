<?php

declare(strict_types=1);

namespace Gansel\Intercom\Value\Attributes;

use Webmozart\Assert\Assert;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
final class UserId
{
    private string $value;

    private function __construct(string $value)
    {
        $value = trim($value);

        Assert::stringNotEmpty($value);
        Assert::notWhitespaceOnly($value);

        $this->value = $value;
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }

    public function toString(): string
    {
        return $this->value;
    }
}
