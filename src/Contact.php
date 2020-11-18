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

use Webmozart\Assert\Assert;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
final class Contact
{
    private const TYPE = 'contact';

    private array $value;
    private CustomAttributes $customAttributes;

    private function __construct(array $value)
    {
        Assert::keyExists($value, 'type');
        Assert::same(self::TYPE, $value['type']);

        $this->value = $value;
        $this->customAttributes = CustomAttributes::fromArray($value['custom_attributes']);
    }

    public static function fromResponse(\stdClass $response): self
    {
        return new self(UnstructuredArray::fromStdClass($response)->value());
    }

    public function id(): string
    {
        return $this->value['id'];
    }

    public function externalId(): string
    {
        return $this->value['external_id'];
    }

    public function customAttributes(): CustomAttributes
    {
        return $this->customAttributes;
    }

    public function toArray(): array
    {
        return $this->value;
    }
}
