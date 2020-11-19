<?php

declare(strict_types=1);

/**
 * This file is part of gansel-rechtsanwaelte/intercom-value-objects.
 *
 * (c) Gansel Rechtsanwälte
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gansel\Intercom\Value;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
interface CanvasInterface
{
    public function toArray(): array;
}
