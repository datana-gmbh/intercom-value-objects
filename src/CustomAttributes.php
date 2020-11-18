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

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
final class CustomAttributes
{
    private array $value;

    private function __construct(array $value)
    {
        $this->value = $value;
    }

    public static function fromArray(array $value): self
    {
        return new self($value);
    }

    public function Aktenzeichen(): ?string
    {
        if (\array_key_exists('Aktenzeichen', $this->value)
            && '' !== trim($this->value['Aktenzeichen'])
        ) {
            return trim($this->value['Aktenzeichen']);
        }

        return null;
    }

    public function toArray(): array
    {
        return $this->value;
    }
}
