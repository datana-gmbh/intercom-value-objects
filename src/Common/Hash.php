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

namespace Gansel\Intercom\Value\Common;

use Webmozart\Assert\Assert;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
final class Hash
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
