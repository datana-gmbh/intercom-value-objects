<?php

declare(strict_types=1);

namespace Gansel\Intercom\Value\Attributes;

use Webmozart\Assert\Assert;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
final class UserHash
{
    private string $value;

    private function __construct(string $value)
    {
        $value = trim($value);

        Assert::stringNotEmpty($value);
        Assert::notWhitespaceOnly($value);

        $this->value = $value;
    }

    public static function forUserId(UserId $userId, string $secret): self
    {
        $secret = trim($secret);

        Assert::stringNotEmpty($secret);
        Assert::notWhitespaceOnly($secret);

        return new self(hash_hmac(
            'sha256',
            $userId->toString(),
            $secret
        ));
    }

    public function toString(): string
    {
        return $this->value;
    }
}
