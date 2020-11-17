<?php

declare(strict_types=1);

namespace Gansel\Intercom\Value\Canvas;

use Webmozart\Assert\Assert;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
final class Component
{
    private array $value;

    private function __construct(array $value)
    {
        Assert::notEmpty($value);

        $this->value = $value;
    }

    public static function Text(string $text, string $style = null): self
    {
        $value = [
            'text' => $text,
            'type' => 'text',
        ];

        if (null !== $style) {
            $value['style'] = $style;
        }

        return new self($value);
    }

    public static function Header(string $text): self
    {
        return self::Text($text, 'header');
    }

    public static function Divider(): self
    {
        return new self([
            'type' => 'divider',
        ]);
    }

    public function toArray(): array
    {
        return $this->value;
    }
}
