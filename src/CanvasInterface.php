<?php

declare(strict_types=1);

namespace App\Intercom\Domain;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
interface CanvasInterface
{
    public function toArray(): array;
}
