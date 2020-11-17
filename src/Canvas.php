<?php

declare(strict_types=1);

namespace Gansel\Intercom\Value;

use Gansel\Intercom\Value\CanvasInterface;
use Gansel\Intercom\Value\Canvas\Components;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
final class Canvas implements CanvasInterface
{
    private Components $components;

    private function __construct(Components $components)
    {
        $this->components = $components;
    }

    public static function fromValues(Components $components): self
    {
        return new self($components);
    }

    public function toArray(): array
    {
        return [
            'canvas' => [
                'content' => $this->components->toArray(),
            ],
        ];
    }
}
