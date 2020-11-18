<?php

declare(strict_types=1);

/*
 * This file is part of gansel-rechtsanwaelte/intercom-value-objects.
 *
 * (c) Gansel Rechtsanwälte
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gansel\Intercom\Value;

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
