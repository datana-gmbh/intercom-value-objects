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

namespace Gansel\Intercom\Value\Tests\Attributes;

use Ergebnis\Test\Util\Helper;
use Gansel\Intercom\Value\Attributes;
use Gansel\Intercom\Value\Security;
use PHPUnit\Framework\TestCase;
use function Symfony\Component\String\u;

final class UserHashTest extends TestCase
{
    use Helper;

    /**
     * @test
     */
    public function isFinal(): void
    {
        self::assertClassIsFinal(Attributes\UserHash::class);
    }

    /**
     * @test
     */
    public function toStringReturnsValidHashForSecret()
    {
        $value = self::faker()->uuid;
        $secret = u(self::faker()->sha256)->truncate(40)->toString();

        $expectedHash = hash_hmac(
            'sha256',
            $value,
            $secret
        );

        $userId = Attributes\UserId::fromString($value);
        $identityVerificationSecret = Security\IdentityVerificationSecret::fromString($secret);

        static::assertSame(
            $expectedHash,
            Attributes\UserHash::forUserId($userId, $identityVerificationSecret)->toString()
        );
    }
}
