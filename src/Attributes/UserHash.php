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

namespace Gansel\Intercom\Value\Attributes;

use Gansel\Intercom\Value\Common\Hash;
use Gansel\Intercom\Value\Security;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
final class UserHash
{
    private Hash $hash;

    private function __construct(Hash $hash)
    {
        $this->hash = $hash;
    }

    public static function forUserId(UserId $userId, Security\IdentityVerificationSecret $secret): self
    {
        $hash = Hash::fromString(hash_hmac(
            'sha256',
            $userId->toString(),
            $secret->toString()
        ));

        return new self($hash);
    }

    public function toString(): string
    {
        return $this->hash->toString();
    }
}
