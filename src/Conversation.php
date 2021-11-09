<?php

declare(strict_types=1);

/**
 * This file is part of datana-gmbh/intercom-value-objects.
 *
 * (c) Datana GmbH
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Datana\Intercom\Value;

use Webmozart\Assert\Assert;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
final class Conversation
{
    private const TYPE = 'conversation';

    private array $value;

    private function __construct(array $values)
    {
        Assert::keyExists($values, 'type');
        Assert::same(self::TYPE, $values['type']);

        $this->value = $values;
    }

    public static function fromResponse(\stdClass $response): self
    {
        return new self(UnstructuredArray::fromStdClass($response)->value());
    }

    public static function fromArray(array $values): self
    {
        return new self($values);
    }

    public function id(): string
    {
        return $this->value['id'];
    }

    public function contactId(): string
    {
        if ('customer_initiated' === $this->value['source']['delivered_as']) {
            return $this->value['source']['author']['id'];
        }

        if ('automated' === $this->value['source']['delivered_as']
            && [] !== $this->value['contacts']['contacts']
            && \array_key_exists(0, $this->value['contacts']['contacts'])
            && 'contact' === $this->value['contacts']['contacts'][0]['type']
        ) {
            return $this->value['contacts']['contacts'][0]['id'];
        }
    }

    public function toArray(): array
    {
        return $this->value;
    }
}
