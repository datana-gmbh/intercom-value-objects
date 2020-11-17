<?php

declare(strict_types=1);

namespace Gansel\Intercom\Value\Canvas;

use Webmozart\Assert\Assert;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
final class ContentUrl
{
    private string $value;

    private function __construct(string $value)
    {
        Assert::stringNotEmpty($value);
        Assert::notWhitespaceOnly($value);
        Assert::startsWith($value, 'http');

        $this->value = trim($value);
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
